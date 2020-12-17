<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Urls;
use Illuminate\Support\Facades\Log;

class UrlControllerTest extends TestCase
{
    /**
     * test store url
     *
     * @return void
     */
    public function testStoreUrl(){
        
        $url = new Urls();
        $url->url = "http://www.example.com";
        $url->user_id = 7;
        $url->save();

        $this->assertNotEmpty(Urls::where('id', $url->id)->get());

        $url->delete();
    }

    /**
     * test get url
     *
     * @return void
     */
    public function testGetUrl(){
        $url = new Urls();
        $url->url = "http://www.example.com";
        $url->user_id = 7;
        $url->save();

        $this->assertNotEmpty(Urls::where('id', $url->id)->get());

        $url->delete();
    }

    /**
     * test edit url
     *
     * @return void
     */
    public function testEditUrl(){
        $url = new Urls();
        $url->url = "http://www.example.com";
        $url->user_id = 7;
        $url->save();

        $url->url = "http://www.example2.com";
        $url->save();

        $editedUrl = Urls::where('id', $url->id)->first();

        $this->assertEquals($editedUrl->url, "http://www.example2.com");

        $url->delete();
    }

    /**
     * test delete url
     *
     * @return void
     */
    public function testDeleteUrl(){
        $url = new Urls();
        $url->url = "http://www.example.com";
        $url->user_id = 7;
        $url->save();

        $this->assertTrue($url->delete());
    }
}
