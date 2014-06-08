PhileCMS Draft tool plugin
==========================

Allows publishing of Markdown files from [Draft](http://draftin.com) to your [Phile CMS](https://github.com/PhileCMS/Phile) install. It's borrowed from  from Zvonko Biškup's [pico_draft plugin](https://github.com/codeforest/pico_draft). 

Requires at least the 1.0.0 release of PhileCMS.

## 1. Installation

**Install via composer (haven't tested)**

```bash
composer require "herbdool/phile-draft:1.*"
```

**Install via git**

Clone this repository from the ```phile``` directory into 
```plugins/herbdool/phileDraft```. E.g:

```bash
git clone git@github.com:herbdool/phileDraft.git plugins/herbdool/phileDraft
```

**Manual Install**

Download and extract the contents into: ```plugins/herbdool/phileDraft```

## 2. Plugin Activation

Activate the plugin in your main Phile ```config.php``` file:

```php
$config['plugins']['herbdool\\phileDraft'] = array('active' => true);
```

Edit the plugins config.php. Enter a long alphanumeric string that is not easily guessed. It will form the URL that Draft expects. Example (don't use this exact string):

    lkjsdfoiuswdeiwersw298723423948jjfskejkjsdf9sksfd9

In [Draft](http://draftin.com) under Settings > Places to Publish, choose WebHook URL. Fill in the site name and the full URL: the domain plus the string that you created. Example:

    https://myexampleblog.com/lkjsdfoiuswdeiwersw298723423948jjfskejkjsdf9sksfd9

For security reasons the URL should be really hard to guess and should ideally only accept connections over https.

## Advantages

* Can publish markdown files to the content directory.
* Draft keeps track of revisions of documents which is really nice for writing copy and allows for collaboration.
* Can save snippets so that you can reuse Meta across documents.
* Publishing revisons to a document from Draft works so long as it has the same name and filepath.

## Limitations

* Can publish files from Draft with spaces which will break the URL (but could probably clean that up in this plugin).
* Can only publish to one folder (maybe Phile can determine the structure from the filename or from the meta data?)
* Can't unpublish or delete files.

## Possible features

* Setting a Status: Draft/Published in meta which gets parsed before html is created so that files can be posted or updated and not available publicly.
* Send a header response to Draft so it has a reference where the document is published.
