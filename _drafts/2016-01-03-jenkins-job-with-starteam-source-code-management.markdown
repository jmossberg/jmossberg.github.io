---
layout: post
title:  "Jenkins job with Starteam as source code management"
date:   2016-01-03 09:00:00
categories: jekyll update
---

## Import Unitydemo git repositiory into Starteam client

1. Run the installation file st-cpc-14.0.4.109-win64.exe
1. Start Starteam client via start menu in Windows:
   ![](/assets/starteam-jenkins/007_starteam_client_start_menu.png) 
1. Start the Open Project Wizard via menu Project - Open...
1. Click on Add Server...
1. Enter Server description: Starteam - Embedable
1. Enter Server address: embedable.duckdns.org
1. Enter TCP/IP endpoint: 49278
1. Disable Compress transferred data
1. Select RSA R4 stream cipher (fast)
   ![](/assets/starteam-jenkins/008_starteam_client_server_configuration.png)
1. Click OK 
1. Double click on the new server configuration Starteam - Embedable
1. TDD should appear below the server configuration
1. Select TDD
1. TDD should appear in the View Tree
1. Click on Finish
1. Right click on TDD
1. Select New
1. Select TDD as parent folder
1. Enter folder name: Unitydemo
1. Click Next
1. Click Next again
1. Click Finish
1. Right click on the Unitydemo folder and select Create Working folders
1. Right click on the Unitydemo folder and select Properties...
1. The path to the working folder will be shown at the bottowm of the window that appears, e.g. C:\cm\TDD\Unitydemo
1. Click Cancel
1. Open the file explorer in Windows and paste Unitydemo files in the the working folder, e.g. C:\cm\TDD\Unitydemo
1. Go back to the Starteam client
1. Right click on the Unitydemo folder and select Show-not-in-view folders
1. Click plus sign to the left of the Unitydemo folder
1. Right click on each folder that appear and select Add to view. You should only do this on "first-level-subfolders". Do not click on any additional plus signs to open new levels of subfolders.
1. Goto the right side of the Starteam client while the Unitydemo folder is selected on the left side. Make sure you are in tab File.
1. Select Files Not In View in the dropdown list
1. Show all descendants by clicking on the button to the right of the dropdown menu.
   ![](/assets/starteam-jenkins/009_starteam_client_show_all_descendants.png)
1. Select all files shown
1. Right click on the selected files and select Add Files...
1. Enter comment and click on OK
1. Goto the left side of Starteam client
1. Click on the plus sign on the left side of the Unitydemo folder and open all sub folders. Make sure all of them are yellow. This means they have been added to Starteam.
   ![](/assets/starteam-jenkins/010_starteam_client_folder_view.png)

## Install Starteam Jenkins plugin

1. Starteam Jenkins plugin is available for download at http://community.microfocus.com/borland/managetrack/starteam/m/mediagallery/317.aspx
   ![](/assets/starteam-jenkins/001_download_starteam_jenkins_plugin.png)
1. The name of the file to download is Starteam.hpi.zip
   ![](/assets/starteam-jenkins/002_download_starteam_jenkins_plugin.png)
1. Rename the downloaded file to Starteam.hpi, do not unpack it it.
1. Goto Jenkins dashboard (startpage, e.g. at localhost:8080) in you webbrowser
1. Select Manage Jenkins - Manage Plugins
1. Click on the Advanced tab
1. Scroll down to section Upload Plugin
1. Click on Browse and select the downloaded and renamed file Starteam.hpi
1. Click on Upload
1. Wait for installation to finish

## Configure Starteam Jenkins plugin

1. Starteam Jenkins plugin must be configured according to section Usage at https://wiki.jenkins-ci.org/display/JENKINS/StarTeam

   > In Global Configuration, you can set the location of your StarTeam SDK installation. If the SDK jar was detected automatically,
   > then you will see "StarTeam SDK successfully loaded." and you can leave the SDK location blank.

2. Goto Jenkins dashboard (startpage, e.g. at localhost:8080) in you webbrowser
1. Select Mange Jenkins - Configure System
1. Scroll down to the Starteam section
1. Set the location of starteam.jar, e.g C:\Program Files\Borland\StarTeam SDK 14.0\lib.
   ![](/assets/starteam-jenkins/003_starteam_jenkins_plugin_configuration.png)
1. Click on Save or Apply

## Create Jenkins job for Unity demo with Starteam

1. Goto Jenkins dashboard (startpage, e.g. at localhost:8080) in you webbrowser
1. Select New Item
1. Enter item name, e.g. Unity demo (starteam)
1. Select Freestyle project
1. Click OK
1. You should now see the configuration screen for the new item (Jenkins job)
1. Scroll down to section Source Code Management
1. Select Starteam
1. Enter Hostname: embedable.duckdns.org
1. Enter Port: 49278
1. Enter Project name: TDD
1. Enter View name: TDD
1. Enter Folder name: Unitydemo
1. Click on Add button next to Credentials
1. Select Username with password in Kind
1. Select Global in Scope
1. Enter Starteam user name in Username
1. Enter Starteam password in Password
1. Click on Add
   ![](/assets/starteam-jenkins/004_new_credentials.png)
1. Click on Test Connection button, you should get Connection Succesful.
   ![](/assets/starteam-jenkins/005_starteam_configuration_in_jenkins_job.png)  
1. Scroll down to section Build
1. Add build step Exectue Windows batch command
1. Enter:

       set Path=c:\cygwin64\bin
       make all
       make run

1. Click on Save or Apply
1. Click on Build Now
1. Select run in Build history
1. Click on Console Output
1. You should get console output similar to screenshot below:
   ![](/assets/starteam-jenkins/006_unity_demo_starteam_console_output.png)
