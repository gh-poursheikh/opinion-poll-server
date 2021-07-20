# Opinion Poll [Server]
> A server-side online poll system
## Table of contents
* [General info](#general-info)
* [Technologies](#technologies)
* [Setup](#setup)
* [Features](#features)
* [Status](#status)
* [Disclaimer](#disclaimer)
* [Contact](#contact)

## General info
A really simple web service feeding [Opinion Poll [Client]](https://github.com/gh-poursheikh/opinion-poll-client.git). It sends a list of sample products to the client, receives the user ratings about the product items and delivers a report about the poll in JSON and *.xlsx file format as well. This web service can be used as a template to implement a back-end online poll on a variety of topics.

## Technologies
* PHP
* MySQL
* [PhpSpreadsheet](https://github.com/PHPOffice/PhpSpreadsheet)

## Setup
The easiest way to run this service is by using a local web server for PHP. For example [XAMPP](https://www.apachefriends.org/index.html) is the most popular PHP development environment. Download and install XAMPP and create a new database named _**opinion_poll**_ with _**utf8mb4_unicode_ci**_ collation. Then clone the [current reopository](https://github.com/gh-poursheikh/opinion-poll-server.git) to XAMPP Document Root directory (htdocs). Navigate to _**Database.sql**_ located in the cloned _**opinion-poll**_ directory. Use that file to create tables and initialize the database. The fresh cloned repo can generate XLSX files on its own, but if you would like to do the prerequisite, you can check out this [install instructions](https://phpspreadsheet.readthedocs.io).

## Features
* Authenticate and distiguish normal and system users
* Insert incoming opinion data into database
* Return reports in JSON and XLSX file formats

TODOs:
* Return reports in PDF file format

## Status
Project is: _in progress_

## Disclaimer
The general topic, all names, their ratings, and incidents portrayed in this application are fictitious. No identification with actual persons (living or deceased) and products is intended or should be inferred. No person or entity associated with this application received payment or anything of value, or entered into any agreement, in connection with the developer. No animals were harmed in the making of this application. :wink:

## Contact
Created by [Ghassem Poursheikh](https://www.linkedin.com/in/ghassem-poursheikh/) - feel free to contact me!
