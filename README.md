phileDraft
==========

Allows publishing of Markdown files from [Draft](http://draftin.com) to your [Phile CMS](https://github.com/PhileCMS/Phile) install.

##Steps

1. Activate the Phile plugin, use the main Phile documentation on how to do that.
2. Edit config.php. Enter a long alphanumeric string that is not easily guessed. It will form the URL that Draft expects. Example:

    lkjsdfoiuswdeiwersw298723423948jjfskejkjsdf9sksfd9

3. In Draft under Settings > Places to Publish, choose WebHook URL. Fill in the site name and the full URL: the domain plus the string that you created. Example:

    https://myexampleblog.com/lkjsdfoiuswdeiwersw298723423948jjfskejkjsdf9sksfd9

For security reasons the URL should be really hard to guess and should ideally only accept connections over https.

##Advantages

* Draft keeps track of revisions of documents which is really nice for writing copy and allows for collaboration.
* Can save snippets so that you can reuse Meta across documents.

##Limitations

* Can publish files from Draft with spaces (but can clean that up in Phile).
* Can only publish to one folder (maybe Phile can determine filename?)
* Can't unpublish or delete files.
