var system = require('system');
var page   = require('webpage').create();
page.settings.userAgent = 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/28.0.1500.71 Safari/537.36';
// system.args[0] is the filename, so system.args[1] is the first real argument
var url    = system.args[1];
// render the page, and run the callback function
page.open(url, function () {
    // page.content is the source
    console.log(page.content);
    // need to call phantom.exit() to prevent from hanging
    phantom.exit();
});