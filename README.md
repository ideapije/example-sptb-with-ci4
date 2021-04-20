## ℹ️ About Repository
We make this repository to learn how to create application with Codeigniter v4. There are 3 points you will get in this repository.
1. API routing.
2. Datatables server side and
3. PHPDocs to export data into Word docs format such as .docx, .doc or .ods

## 🧰 System Requirements
This repository requires the following :
- PHP 5.3.3+ or higher.
- [XML Parser extension](http://www.php.net/manual/en/xml.installation.php)
- [Laminas Escaper component](https://docs.laminas.dev/laminas-escaper/intro/)
- [Zip extension](http://php.net/manual/en/book.zip.php) (optional, used to write OOXML and ODF)
- [GD extension](http://php.net/manual/en/book.image.php) (optional, used to add images)
- [XMLWriter extension](http://php.net/manual/en/book.xmlwriter.php) (optional, used to write OOXML and ODF)
- [XSL extension](http://php.net/manual/en/book.xsl.php) (optional, used to apply XSL style sheet to template )
- [dompdf library](https://github.com/dompdf/dompdf) (optional, used to write PDF)
## 🚀 Get Started
1. Make sure you already installed Composer, you can find instalation composer [here](https://getcomposer.org/).
2. Open your terminal and follow the instructions below one by one.
```
git clone https://github.com/ideapije/example-sptb-with-ci4.git
cd example-sptb-with-ci4
composer install
cp env .env
vi .env
```
3. Setup configuration in ```.env file``` like this. 
> Please don't replace all inside the .env file with this section, but find the key and insert the following value below.
```
app.baseURL = 'http://localhost' // if you use server built in with port 8080 or http://localhost/example-sptb-with-ci4 if you place the project in public html.
...

#--------------------------------------------------------------------
# DATABASE
#--------------------------------------------------------------------

database.default.hostname = localhost
database.default.database = your_database
database.default.username = root //default mysql user
database.default.password = // leave empty if mysql password not required
database.default.DBDriver = MySQLi
```
4. run migration
```
php spark migrate
```
5. run app (optional)
```
php spark serve
```
Now point your browser to the correct URL you will be greeted by a welcome screen. Try it now by heading to the following URL:

[http://localhost:8080](http://localhost:8080)


6. Finish 

## 📫 Mailbox

If you have some advice for this documentation or something else with this repository then Fork this reposity and make Pull Request. We are very welcome for anyone who want to improve this repository. 
