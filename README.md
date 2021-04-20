## ℹ️ About Repository
We make this repository to learn how to create applications with Codeigniter v4. There are 3 features you will find in this repository.
1. API routing,
2. Server-side datatables, and
3. PHPDocs to export data into Word docs format such as .docx, .doc or .ods.

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
## 🚀 Getting Started
1. Make sure your computer already has Composer installed, otherwise you can find Composer installation step [here](https://getcomposer.org/).
2. Open your terminal and follow the following instructions one by one.
```
git clone https://github.com/ideapije/example-sptb-with-ci4.git
cd example-sptb-with-ci4
composer install
cp env .env
vi .env
```
3. Enter your computer configurations into the ```.env``` file.
> Please don't replace all configurations inside the .env file; find the key, uncomment and edit your configuration like the following example instead.
```
// Fill in 'http://localhost:8080' if you're going to use "php spark serve" command; or
// 'http://localhost/example-sptb-with-ci4/public' if you're cloning this repository inside your public_html folder.
app.baseURL = 'http://localhost:8080'
...

#--------------------------------------------------------------------
# DATABASE
#--------------------------------------------------------------------

database.default.hostname = localhost
database.default.database = database_name
database.default.username = root // default mysql user
database.default.password = // leave it empty if mysql password is not configured
database.default.DBDriver = MySQLi
```
4. Run migration files.
```
php spark migrate
```
5. Run this app (optional).
```
php spark serve
```
Now point your browser to the correct URL and you will be greeted by this app welcome screen. Try it now by opening the following URL:

[http://localhost:8080](http://localhost:8080)

or

[http://localhost/example-sptb-with-ci4/public](http://localhost/example-sptb-with-ci4/public)


6. Finish.

## 📫 Mailbox

If you have advices or found bugs in this repository, please Fork this repository and make a Pull Request. We are welcoming anyone who wants to improve this repository.
