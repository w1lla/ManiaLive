<?php
/**
 * Twitter
 * @name Twitter
 * @data-made 08-02-2013
 * @date-finished 08-02-2013
 * @version 1.0
 * @package Twitter
 *
 * @author Willem van den Munckhof
 * @copyright © 2013
 *
 * ---------------------------------------------------------------------
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 * ---------------------------------------------------------------------
 * You are allowed to change things or use this in other projects, as
 * long as you leave the information at the top (name, date, version,
 * website, package, author, copyright) and publish the code under
 * the GNU General Public License version 3.
 * ---------------------------------------------------------------------
 */
namespace ManiaLivePlugins\Twitter\Twitter;

class Twitter extends \ManiaLive\PluginHandler\Plugin {

	/**
     * onInit()
     * Function called on initialisation of ManiaLive.
     *
     * @return void
     */
    function onInit() {
        $this->setVersion(1);
		require_once('libraries/ManiaLivePlugins/Twitter/Twitter/twitter.class.php');
		$config = Config::getInstance();
		$this->Twitter = new Twitterer($config->consumerKey, $config->consumerSecret, $config->accessToken, $config->accessTokenSecret);
		var_dump($this->Twitter);
    }
	
	public function onReady() {
	
		 $this->enableDedicatedEvents();

		try {
		$tweet = $this->Twitter->send('Manialive TweetCast :P');

		} catch (TwitterException $e) {
		echo 'Error: ' . $e->getMessage();
		}
	 }
}
?>