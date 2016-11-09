<?php


use App\Lib\Helpers\RadioFeedGateway;

class RadioFeedGatewayTest extends PHPUnit_Framework_TestCase
{
    const FEED_FILE_NAME = './tests/Files/testFeed.xml';

    /**
     * @group Helpers
     * @group RadioFeedGateway
     * @group radioFeedGetJson
     */
    public function testItReturnsExpectedJsonFormat()
    {
        $radioFeed = new RadioFeedGateway();
        $parsed = $radioFeed->getPodcastJsonFromFeed(self::FEED_FILE_NAME);
        $this->assertNotEmpty($parsed);
        $this->assertJson($parsed);
    }

    /**
     * @group Helpers
     * @group RadioFeedGateway
     * @group radioFeedGetArray
     */
    public function testItReturnsExpectedArrayFormat()
    {
        $radioFeed = new RadioFeedGateway();
        $parsed = $radioFeed->getPodcastArrayFromFeed(self::FEED_FILE_NAME);
        $this->assertNotEmpty($parsed);
        $this->assertTrue(is_array($parsed));
    }

    /**
     * @group Helpers
     * @group RadioFeedGateway
     * @group arrayAlternativeParser
     */
    public function testAlternativeParser()
    {
        $radioFeed = new RadioFeedGateway();
        $parsed = $radioFeed->parsePodcastArrayFromFeed(self::FEED_FILE_NAME);
        $this->assertNotEmpty($parsed);
        $this->assertTrue(is_array($parsed));
    }

    /**
     * @group Helpers
     * @group RadioFeedGateway
     * @group remoteAlternativeParser
     */
    public function testRemoteAlternativeParser()
    {
        $radioFeed = new RadioFeedGateway();
        $parsed = $radioFeed->parsePodcastArrayFromFeed('http://www.radio24.ilsole24ore.com/podcast/lazanzara.xml');
        $this->assertNotEmpty($parsed);
        $this->assertTrue(is_array($parsed));
    }



}
