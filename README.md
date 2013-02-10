ManiaLivePlugins by W1lla
=========

Manialive Plugins, ManiaPlanet, Twitter, Rounds

=========

Initial release 07-02-2013(RoundReport):

- Initial release of RoundReport based on plugin.rounds.php from xaseco2.

- updated Release of RoundReport: Mapscores + GUI.


Hi all,

After a few months thinking about a way to make a nice Spectator Mode for TM aswell for the upcoming environments.

I came across some suggestions on topic provided by the forums aswell as code from others.

Source:
[url=http://forum.maniaplanet.com/viewtopic.php?f=9&t=1246&start=50#p23615]Spectator Overlay(Maniascript but it has to be in a maniascripted gamemode)[/url]

[url=http://forum.maniaplanet.com/viewtopic.php?f=9&t=106&start=30]Spectator Mode suggestions[/url]

The code is originally from Xymph which a nice  :1010 is in place for the work he put in the original plugin.rounds.php but it missed some vital functions ;). Which i added.(Its only a DNF (DNF = Did not Finish))

I came with a new plugin: RoundReport.

RoundReport is based on the gamemodes; Rounds, Team and Cup.

For the Moment the GUI (http://i.imgur.com/6IOICS3.png) is made for Team mode.

Some Screenshots:

https://github.com/w1lla/ManiaLive/blob/master/libraries/ManiaLivePlugins/screenshots/ScoreShown.jpg Shows the Score without the usage of F1 Key.
https://github.com/w1lla/ManiaLive/blob/master/libraries/ManiaLivePlugins/screenshots/NoScoreShown.jpg Shows that the GUI is gone when F1 is pressed.
https://github.com/w1lla/ManiaLive/blob/master/screenshots/match2-1-0_.jpg Round Score + MapScore

Feature list to come:
- CP Times can be done through other Plugins im afraid(Might make an other plugin if others do not make it!!)

In Teammode it shows the score in Rounds + The score in Maps.

To reset the mapsscore do a /end as Admin. To set Admin go to the config.ini of manialive and make yourself an admin.

It tells through GUI or chatmessages what players did finish and didnt finish but also if nobody finished at all.

There might be some bugs as it was tested with one player.

Please be gentle and be kind to report bugs/errors if you like.

If you have a suggestion: Also that is more than welcome.

With further a-do:

[url=https://github.com/w1lla/ManiaLive/archive/master.zip]Download the latest Master[/url]

Put the libraries folder inside your Manialive folder and edit the config.ini and add [code] manialive.plugins[] = 'RoundReport\Rounds'[/code]
Edit in Config.php the false to true to enable Window or Chat. :)

with kindly regards,

w1lla

=========

Initial Release 08-02-2013(Twitter):

- Initial release of Twitter plugin.

This will send a Tweet onReady(). It will put out a message after restarting manialive that the Tweet is a duplicate. No hard feelings for it though.

To set it up:

Sign in to the http://twitter.com and register an application from the http://dev.twitter.com/apps page.
!!!Remember to never reveal your consumer secrets.!!!
Click on My Access Token link from the sidebar and retrieve your own access token.
Now you have consumer key, consumer secret, access token and access token secret.

Set the consumer key, consumer secret, access token and access token secret in the Config.php of Twitter plugin.

Save the file and start it up.
=========
