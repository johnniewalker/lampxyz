lampxyz
=======

A demonstration project that uses Linux, Apache, Mysql, Php, Xandria, Yalla and Zend technologies.

This demo is to be used as a cheat-sheet for new projects.

Note: Xandria and Yalla are two projects under incubation under my GitHub account. So, there is not much info about them out there just yet. Browse the projects at https://github.com/johnniewalker for more information.

### Planned Project Directory Structure

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
 LICENSE
 README.md
```

Much of this structure is based on tips that I picked up from the following books:

* *Pragmatic Vesion Control Using Subversion 2nd Edtion (2006), By Mike Mason (page 138-139)*, and
* *The Art of Unix Programming (2004), by Eric S. Raymond (page 452)*

---


* data/
 
 A single location to put any data that the project might need to carry (i.e information needed to populate lookup tables in the database).

* db/
 
 A place to store all the database schema related stuff. Scripts that describe the initial schema, scripts that update that schema and scripts to migrate data between schema changes or version changes.

* docs/
  
 Docs have the .org suffix to enable easy writing in orgmode for emacs. A tool which, apparently makes hierarchical data easier to edit.
 
* requirements.org  
 
 A note to explain the requirements change process and how requirements are stored. I base the system on the ideas found in Steve McConnell's book 'Software Project Survival Guide'.
 
* non-user-documentation.org 

 Any requirements that cannot be classed as User Documentation go in this orgmode document. For this project the definition of a 'User' is very broad.

* user-documentation.org

 All other requirements go in this orgmode document in the form of User Documentation.
 
* my-meta-project-tools/
 
 A place to put custom tools that analyse the code. i.e a *PhpDocRunnerApp* to break up the automatic code documentation generation process if the project is too large.

* vendorsrc/

 A place to store copies of releases of 3rd party code that the project depends on. This may be a bit of duplicatoin but is just to ensure that if that vendor disappears into the ether, it won't hamper this project as well. 

* websrv/
 
 When the project is deployed, this directory sits on the server but is not accessable by the public. It is the  place to put the web root (a.k.a publicdocs/httpdocs/www) directory, the web application, vendor library's and application data.

* LICENSE

 A document that explains how the copyright oweners of the project expect people to behave in terms of the intellectual property.

* README.md
 This file. A description of the project's purpose an overview of the project directory contents. According to *The Art of Unix Programming* book, by convention, the README file is the first place that one should look when trying to understand more about a directory.



 
 

 

 



