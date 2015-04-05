# Apply with linkedin - PHP

<h1>Linkedin Class which generates a PDF based upon user profile</h1>

<h2>Why should I use this library?</h2>
<ul>
    <li>IDE friendly:
    The library is IDE friendly, you don't need to check linkedin website to view available fields.
  
    <code>
      $linkedin->getFormattedName();
      $linkedin->getFirstName();
    </code></li>
    <li>
    Generates PDF from members profile
    </li>
    <li>
     Few line of code. You can create a PDF from members profile, display it in browser
    </li>
    <li>
     Saves time!
    </li>
</ul>


<h3>The reason why I have use oauth 1 is because you can clear the tokens, and you can enforce user to sign in again! </h3>

<h2>Installation</h2>
<h3>Composer</h3>
If your using composer add this to your dependencies:

<code>
"soroush/apply-with-linkedin-php": "dev-master"
</code>

<h3>PHP OAUTH driver</h3>
You would need to install the PHP OAUTH Driver
Execute this command on your machine
<code>
pecl install oauth
</code>


<h2>Sample code</h2>

<code>
require_once 'vendor/autoload.php';

$consumerKey = '';
$consumerSecret = '';

$linkedin = new \Soroush\Linkedin\Linkedin($consumerKey, $consumerSecret);

if ($linkedin->isLoggedIn()) {
    echo $linkedin->fetch()->downloadPdf();
} else {
    echo $linkedin->getLoginUrl();
}
</code>

<h3>For complete guide visit </h3>
<a href="http://soroushatarod.github.io/apply-with-linkedin-php/">http://soroushatarod.github.io/apply-with-linkedin-php/</a>
