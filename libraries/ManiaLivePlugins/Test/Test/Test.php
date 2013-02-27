<?php
/**
 * RelayChat
 * @name RelayChat
 * @data-made 08-02-2013
 * @date-finished 08-02-2013
 * @version 1.0
 * @package RelayChat
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
namespace ManiaLivePlugins\Test\Test;

    use ManiaLive\Utilities\Console;
	use DedicatedApi\Xmlrpc\Base64;
class Test extends \ManiaLive\PluginHandler\Plugin {
		
		
	public $isrelay = false;
	public $relaymaster = null;
	public $relaylist = array();
		
	/**
     * onInit()
     * Function called on initialisation of ManiaLive.
     *
     * @return void
     */
    function onInit() {
        $this->setVersion('0.0.1');
    }
	
	/**
     * onLoad()
     * Function called on loading of ManiaLive.
     *
     * @return void
     */
    function onLoad() {
        $this->enableDedicatedEvents();
	
    }
	
	 public function onReady() {
	 $this->onShow();
	 }
	 
	 function onShow() {
	 
		Console::println(' #####################################################################');
		Console::println('[eXpension Pack] Checking for a ManiaChannel!');
		try {
		$playerspeclist = $this->connection->getPlayerList(300,1,3);
		$this->relaylist = $playerspeclist;
		foreach ($playerspeclist as $plspeclist)
		{
		//var_dump($plspeclist->spectatorStatus);
		//var_dump($plspeclist->login);
		if ($plspeclist->isServer == true && $plspeclist->spectatorStatus == 2551101){
		Console::println('[eXpension Pack] Found a ManiaChannel: Login:		'.$plspeclist->login.'');
		Console::println('[eXpension Pack] Found a ManiaChannel: Nickname:	'.$plspeclist->nickName.'');
		Console::println(' #####################################################################');
		}
		elseif ($plspeclist->isServer == false && $plspeclist->spectatorStatus == 0){

		}
		}
        } catch (\Exception $e) {
         Console::println('[eXpension Pack] No ManiaChannel Found!');               
                    }
					
		$this->SendtoRelay();

		}

	function SendtoRelay(){
	//$data = 'Hello! Welcome to the TM2 Stadium RelayChat plugin made by w1lla'; //chat text
	$Page = '<manialinks>';
	$Page .= '<manialink id="121212121212123">';
	$Page .= '<frame posn="0 0 0" id="FrameShow">';
	//$Page .= '<quad posn="-50 35 0" sizen="20 10" halign="center" style="TitleLogos" substyle="Title"/>';
	$Page .= '<quad posn="-50 50" sizen="100 100" scale="1" image="http://www.tmrankings.com/manialink/scoresBg.dds" />';
	$Page .= '<frame>';
	$Page .= '<quad posn="-11.5 21" sizen="8.5 10" scale="0.7" style="Emblems" substyle="#1" />';
	$Page .= '<label id="team1name" posn="-20 19" sizen="40 4" halign="center" text="$oTest" />';
	$Page .= '<label posn="-9 13" sizen="5 5" scale="1" valign="center" style="TextValueBigSm" text="0"/>';
	$Page .= '</frame>';
	$Page .= '<label posn="-3.4 13" text="0:0" style="TextRaceMessageBig" />';
	$Page .= '<frame>';
	$Page .= '<quad posn="5.5 21" sizen="8.5 10" scale="0.7" style="Emblems" substyle="#2" />';
	$Page .= '<label id="team2name" posn="20 19" sizen="40 4" halign="center" text="$oTest1" />';
	$Page .= '<label posn="9 13" sizen="5 5" scale="1" halign="right" valign="center" style="TextValueBigSm" text="0"/>';
	$Page .= '</frame>';
	$Page .= '</frame>';
$Page .= '<script><!--
	main () {
		declare FrameRules	<=> Page.GetFirstChild("FrameShow");
		declare ShowRules = True;
			
		while(True) {
			yield;
			
			if (ShowRules) {
				FrameRules.Show();
			} else {
				FrameRules.Hide();
			}

			foreach (Event in PendingEvents) {
				switch (Event.Type) {
					case CMlEvent::Type::MouseClick :
					{		
						if (Event.ControlId == "FrameRules") ShowRules = !ShowRules;
					}
			
					case CMlEvent::Type::KeyPress:
					{
						if (Event.CharPressed == "2424832") ShowRules = !ShowRules;	// F1
					}
				}
			}
		}
	}
--></script>';
	$Page .= '</manialink>';
	$Page .= '</manialinks>';
	$data64len = strlen($Page);
	if($data64len > 5450){ // using TunnelSendDataToId
		Console::println('sendToRelay:: Error, data too big: encoded/compressed data exceed 5450 bytes ('.$data64len.') !');
		return false;
	}
	//var_dump($data);
	//$this->connection->chatSendServerMessage($data, $this->relaylist[0]->login);
	$sent = $this->connection->tunnelSendDataFromString($this->relaylist[0]->login, $Page);
	//var_dump($sent);
	//var_dump($this->relaylist[0]->login);
	}
	
	function onTunnelDataReceived($playerUid, $login, $data) { 
	var_dump($login);
	var_dump($playerUid);/* Data = for chat
		foreach ($this->storage->spectators as $login => $player) { // get players
	$this->connection->chatSendServerMessage($data, $player->login);
}*/
foreach ($this->storage->spectators as $login => $player) { // get players
	$this->connection->sendDisplayManialinkPage($player->login, $data, 0, true, true);
}
	
	}
	
	}
?>