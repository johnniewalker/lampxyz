lampxyz
=======

A demonstration project that uses Linux, Apache, Mysql, Php, Xandria, Yalla and Zend technologies.

This demo is to be used as a cheat-sheet for new projects.

Note: Xandria and Yalla are two projects under incubation under my GitHub account. So, there is not much info about them out there just yet. Browse the projects at https://github.com/johnniewalker for more information.


# Directory Naming Conventions Borrowed

Much of this structure is based on tips that I picked up from the following books:

* *Pragmatic Version Control Using Subversion 2nd Edtion (2006), By Mike Mason (page 138-139)*, and
* *The Art of Unix Programming (2004), by Eric S. Raymond (page 452)*

Also of note: Many projects also mimic the directory usage and naming conventions set out in the *Filesystem Hierarchy Standard*.
* http://en.wikipedia.org/wiki/Filesystem_Hierarchy_Standard -- Wikipedia entry about *Filesystem Hierarchy Standard*
* http://refspecs.linuxfoundation.org/fhs.shtml -- The official specfications. No more than 50, A4, pages of information that will explain a huge amount the meaning of many directories in the world.

---

# Planned Project Directory Structure

This is the plan for the project structure. Check against actual directory to see if the structure came out according to plan.

```
/
 data/
 db/
 docs/
  requirements.org  
  non-user-documentation.org 
  user-documentation.org
 my-meta-project-tools/
 vendorsrc/
 websrv/
  appdata/
   app_logs/
    atomic_logs/
     archive/
     inbox/
   cache/
   SqliteData/
   test-data/
    Selenese/
    tmp/ 
   uploads/
  error_docs/
  httpdocs-err-notice-site-flat/
   .htaccess
   index.htm
  httpdocs/
   .htaccess
   index.php
  inc_library/
   app/
   tests/
    tests/
     acceptance_tests/
     data_tests/
     fixtures/
     setup_tests/
     intgrtn_tsts/
     unit_tests/
     exsuite_tests/
      LanguageTests
      ThrowawayScripts/
      pagestraps/
     run_test.php 
     all_tests.php
    testsuite_interface/
   vendor/
  vm-conf/
  vm-statistics.example
   logs/
    access_log
    access_ssl_log
    error_log 
 LICENSE
 README.md
```


## data/
 
 A single location to put any data that the project might need to carry (i.e information needed to populate lookup tables in the database).

## db/
 
 A place to store all the database schema related stuff. Scripts that describe the initial schema, scripts that update that schema and scripts to migrate data between schema changes or version changes.

## docs/
  
 Docs have the .org suffix to enable easy writing in orgmode for emacs. A tool which, apparently makes hierarchical data easier to edit.
 
## requirements.org  
 
 A note to explain the requirements change process and how requirements are stored. I base the system on the ideas found in Steve McConnell's book 'Software Project Survival Guide'.
 
## non-user-documentation.org 

 Any requirements that cannot be classed as User Documentation go in this orgmode document. For this project the definition of a 'User' is very broad.

## user-documentation.org

 All other requirements go in this orgmode document in the form of User Documentation.
 
## my-meta-project-tools/
 
 A place to put custom tools that analyse the code. i.e a *PhpDocRunnerApp* to break up the automatic code documentation generation process if the project is too large.

## vendorsrc/

 A place to store copies of releases of 3rd party code that the project depends on. This may be a bit of duplicatoin but is just to ensure that if that vendor disappears into the ether, it won't hamper this project as well. 

## websrv/
 
 When the project is deployed, this directory sits on the web server. This directory is not accessable by the public but it does contain the directory that is. In other words it contains the directory that contains the site's home page. `websrv/` also contains things like the web application code, vendor's library code and application data. 
 
 Because no one can agree on terminology to describe this directory, I tend to set an environment variable in Apache's config for this directory called something along the lines of `BEHIND_HTDOCS` for use by scripts and to make it's purpose clear and to explicitly state that it is not meant to be accessable by the public.
 
 
#### appdata/

 Location were application can store variable data during it's lifetime. I find it nice to keep all writable directories under one roof. Some projects call this the `var/` directory. Some of these directories are holders for unversioned data.
 
 
##### app_logs/

 The place for the application to put any custom log files that it may want to write.
 
###### atomic_logs

 A place to manage one-log-file-per-log-entry type of logs. Log data is appended to a file named after unix micro-time. To limits chances of concurrency issues.
 
####### archive
 
 Move atomic logs to here to allow the atomic log inbox to be cleared regulary while allowing us to keep a record of outstanding issues.
 
####### inbox 

 The application writes `atomic logs` to here. The *atomic log browser* can look in here for latest logs.
 
##### cache/

 Single directory to store any data that the application wishes to cache.
 
##### SqliteData/

 The root directory for the sqlite db.
 
##### test-data/

 A place for test data related to testing. 
 
###### Selenese/

 A place to store selenes data used by Selenium the web testing plugin for Firefox.
 
###### tmp/ 

 A place for test code to write and wipe during unit tests. Version control systems generally ignore all files inside here.
 
##### uploads/

 Somewhere for the application to store uploaded data.
 
#### error_docs/

 Standard html files to represent the various http errors that may occur. This directory tends to be pre-filled with data by many web hosts / web host management tools.
 
#### httpdocs-err-notice-site-flat/

 A very light (but pretty), emergency, static web site ready to be swappped into place of the normal `httpdocs` directory if things start going wrong.

#### httpdocs/

 The home for public documents like images, cascading style sheets (css), javascript scripts, the web site's home page and other static pages, *bootstraps* or *bootpages*.
 
##### .htaccess

 The web root 
##### index.php

 The main bootstrap page.
 
#### inc_library/

 The place to store included scripts. This (or it's subdiretories) is mentioned in the include path.

##### app/

 Instances of Zend Framework applications. Model, controller and view code.

##### tests/

 The home for test code.

###### tests/

 To store unit tests, test runners and test fixtures
 
 acceptance_tests/ -- Web tests run over http to mimic the behaviour of a user.
 
 data_tests/ -- Tests that (a) ensure the db is set-up correctly or (b) can only be run once the db is set-up. 
 
 fixtures/ -- Not tests. 
 
 setup_tests/ -- Run to test the environment is set-up correctly.
 
 intgrtn_tsts/ -- Test more than one class at the same time.
 
 unit_tests/ -- Test one class at a time.
 
 exsuite_tests/ -- A place to put non-unit test code.
 
   LanguageTests -- Quick scripts to experiment / confirm how a particular scripting language works.
 
   ThrowawayScripts/ -- A bin for stuff that can be deleted without worry.
 
   pagestraps/ -- Manually run visual tests for controllers and views.
 
 run_test.php -- Test runner script includes the appropriate test / suite of tests.
 
 all_tests.php -- A suite to run all tests.
 
 
###### testsuite_interface/  

 To store a web interface application that provide a GUI to unit tests.
 
##### vendor/
 
 3rd party code libraries. Basically anything that is not part of any of the MVC applications hosted on this virtual host/ host.  
 
 I tend to contain each library in a parent named after the version. This enables me to toggle the include path to upgrade to a newer version of the library whilst keeping the older version standing in place in case we need to revert.
 
###### simpletest-x-y-z/
###### simpletest/

###### Zend-v-a-b-c/
####### Zend/

###### Zend-v-x-y-z/
####### Zend/

###### Xandria-v-x-y-z/
####### Xandria/


#### vm-conf/
#### vm-statistics.example
##### logs/
###### access_log
###### access_ssl_log
###### error_log

## LICENSE

 A document that explains how the copyright oweners of the project expect people to behave in terms of the intellectual property.

## README.md
 This file. A description of the project's purpose an overview of the project directory contents. According to *The Art of Unix Programming* book, by convention, the README file is the first place that one should look when trying to understand more about a directory.
