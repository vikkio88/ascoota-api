<?php


namespace App\Lib\Helpers;


use App\Lib\Parsers\Exceptions\InvalidFeedFormatException;
use App\Models\Podcasts\Podcast;
use App\Models\Podcasts\RadioShow;
use Carbon\Carbon;

class PodcastFeedImporter
{
    /**
     * @var array
     */
    private $parsedResult;
    /**
     * @var null
     */
    private $feedUrl;

    private $radioShow = null;
    private $podcasts = [];

    /**
     * PodcastFeedImporter constructor.
     * @param array $parsedResult
     * @throws InvalidFeedFormatException
     */
    public function __construct(array $parsedResult, $feedUrl = null)
    {
        if (!$this->validate($parsedResult)) {
            throw new InvalidFeedFormatException();
        }
        $this->parsedResult = $parsedResult;
        $this->feedUrl = $feedUrl;
    }

    private function validate($parsedResult)
    {
        if (!isset($parsedResult['channel'])) {
            return false;
        }
        $channel = $parsedResult['channel'];
        if (
            !isset($channel['title'])
            ||
            !isset($channel['item'])
            ||
            empty($channel['item'])
        ) {
            return false;
        }
        return true;
    }

    /**
     * @return RadioShow
     */
    public function getShowInfo()
    {
        if (empty($this->radioShow)) {
            $radioShow = new RadioShow();
            $radioShow->name = $this->getAttributeFromFeed('title');
            $radioShow->description = $this->getAttributeFromFeed('description');
            $radioShow->author = $this->getAttributeFromFeed('itunes:author');
            $radioShow->website = $this->getAttributeFromFeed('link');
            $radioShow->explicit = strtolower($this->getAttributeFromFeed('itunes:explicit')) === "yes" ? true : false;
            $image = $this->getAttributeFromFeed('itunes:image');
            $image = isset($image['@attributes']['href']) ? $image['@attributes']['href'] : null;
            $radioShow->logo_url = $image;
            $radioShow->feed_url = $this->feedUrl;
            $this->radioShow = $radioShow;
        }
        return $this->radioShow;
    }

    /**
     * @param string $attributeName
     * @return null|string
     */
    private function getAttributeFromFeed($attributeName)
    {
        $channel = $this->parsedResult['channel'];
        return $this->getOrNull($channel, $attributeName);
    }

    public function getPodcastsInfo($latestGuid = null)
    {
        if (empty($this->podcasts)) {
            $items = $this->getAttributeFromFeed('item');
            foreach ($items as $item) {
                $podcast = $this->getPodcastFromFeedItem($item);
                if ($latestGuid !== null && $podcast->file_url == $latestGuid){
                    return $this->podcasts;
                }
                $this->podcasts[] = $podcast;
            }
        }

        return $this->podcasts;
    }

    private function getPodcastFromFeedItem(array $item)
    {
        $podcast = new Podcast();
        $podcast->name = $this->getOrNull($item, 'title');
        $podcast->description = $this->getOrNull($item, 'description');
        $podcast->duration = $this->getOrNull($item, 'itunes:duration');
        $podcast->file_url = $this->getOrNull($item, 'guid');
        $podcast->date = new Carbon($this->getOrNull($item, 'pubDate'));
        return $podcast;
    }

    private function getOrNull(array $array, $key)
    {
        if (!isset($array[$key])) {
            return null;
        }
        return $array[$key];
    }

}