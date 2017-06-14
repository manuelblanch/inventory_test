<?php

/* search.twig */
class __TwigTemplate_6e6479402505d6edc4d46d665300342d60fb92f5d8ffba1fc36aee47bd2f55d0 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate('layout/layout.twig', 'search.twig', 1);
        $this->blocks = [
            'title'        => [$this, 'block_title'],
            'body_class'   => [$this, 'block_body_class'],
            'page_content' => [$this, 'block_page_content'],
            'js_search'    => [$this, 'block_js_search'],
        ];
    }

    protected function doGetParent(array $context)
    {
        return 'layout/layout.twig';
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 2
        $context['__internal_2537c18af28847d7a6b372a2978f0bd029bf3552306e0d9b5a8b83c9f71f39db'] = $this->loadTemplate('macros.twig', 'search.twig', 2);
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        echo 'Search | ';
        $this->displayParentBlock('title', $context, $blocks);
    }

    // line 4
    public function block_body_class($context, array $blocks = [])
    {
        echo 'search-page';
    }

    // line 6
    public function block_page_content($context, array $blocks = [])
    {
        // line 7
        echo '
    <div class="page-header">
        <h1>Search</h1>
    </div>

    <p>This page allows you to search through the API documentation for
    specific terms. Enter your search words into the box below and click
    "submit". The search will be performed on namespaces, classes, interfaces,
    traits, functions, and methods.</p>

    <form class="form-inline" role="form" action="';
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('Sami\Renderer\TwigExtension')->pathForStaticFile($context, 'search.html'), 'html', null, true);
        echo '" method="GET">
        <div class="form-group">
            <label class="sr-only" for="search">Search</label>
            <input type="search" class="form-control" name="search" id="search" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">submit</button>
    </form>

    <h2>Search Results</h2>

    <div class="container-fluid">
        <ul class="search-results"></ul>
    </div>

    ';
        // line 31
        $this->displayBlock('js_search', $context, $blocks);
        echo '

';
    }

    // line 35
    public function block_js_search($context, array $blocks = [])
    {
        // line 36
        echo "    <script type=\"text/javascript\">

        (function() {
            var term = Sami.cleanSearchTerm();

            if (!term) {
                \$('h2').hide();
                return;
            }

            \$('#search').val(term);
            var container = \$('.search-results');
            var results = Sami.search(term);
            var len = results.length;

            if (len == 0) {
                container.html('No results were found');
                return;
            }

            for (var i = 0, text_content = ''; i < len; i++) {

                var ele = results[i];
                var contents = '<li><h2 class=\"clearfix\">';
                var class_name = Sami.getSearchClass(ele.type);
                contents += '<a href=\"' + ele.link + '\">' + ele.name + '</a>';
                contents += '<div class=\"search-type type-' + ele.type + '\"><span class=\"pull-right label ' + class_name + '\">' + ele.type + '</span></div>';
                contents += '</h2>';

                if (ele.fromName && ele.fromLink) {
                    contents += '<div class=\"search-from\">from <a href=\"' + ele.fromLink + '\">' + ele.fromName + '</a></div>';
                }

                contents += '<div class=\"search-description\">';

                // Add description, decode entities, and strip wrapping quotes
                if (ele.doc) {
                    text_content = \$('<p>' + ele.doc + '</p>').text();
                    if (text_content[0] == '\"') {
                        text_content = text_content.substring(1);
                    }
                    if (text_content[text_content.length - 1] == '\"') {
                        text_content = text_content.substring(0, text_content.length - 1);
                    }
                    contents += text_content;
                }

                contents += '</div></li>';
                container.append(\$(contents));
            }
        })();
    </script>
";
    }

    public function getTemplateName()
    {
        return 'search.twig';
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return [89 => 36,  86 => 35,  79 => 31,  62 => 17,  50 => 7,  47 => 6,  41 => 4,  34 => 3,  30 => 1,  28 => 2,  11 => 1];
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends \"layout/layout.twig\" %}
{% from \"macros.twig\" import class_link, namespace_link, method_link, property_link %}
{% block title %}Search | {{ parent() }}{% endblock %}
{% block body_class 'search-page' %}

{% block page_content %}

    <div class=\"page-header\">
        <h1>Search</h1>
    </div>

    <p>This page allows you to search through the API documentation for
    specific terms. Enter your search words into the box below and click
    \"submit\". The search will be performed on namespaces, classes, interfaces,
    traits, functions, and methods.</p>

    <form class=\"form-inline\" role=\"form\" action=\"{{ path('search.html') }}\" method=\"GET\">
        <div class=\"form-group\">
            <label class=\"sr-only\" for=\"search\">Search</label>
            <input type=\"search\" class=\"form-control\" name=\"search\" id=\"search\" placeholder=\"Search\">
        </div>
        <button type=\"submit\" class=\"btn btn-default\">submit</button>
    </form>

    <h2>Search Results</h2>

    <div class=\"container-fluid\">
        <ul class=\"search-results\"></ul>
    </div>

    {{ block('js_search') }}

{% endblock %}

{% block js_search %}
    <script type=\"text/javascript\">

        (function() {
            var term = Sami.cleanSearchTerm();

            if (!term) {
                \$('h2').hide();
                return;
            }

            \$('#search').val(term);
            var container = \$('.search-results');
            var results = Sami.search(term);
            var len = results.length;

            if (len == 0) {
                container.html('No results were found');
                return;
            }

            for (var i = 0, text_content = ''; i < len; i++) {

                var ele = results[i];
                var contents = '<li><h2 class=\"clearfix\">';
                var class_name = Sami.getSearchClass(ele.type);
                contents += '<a href=\"' + ele.link + '\">' + ele.name + '</a>';
                contents += '<div class=\"search-type type-' + ele.type + '\"><span class=\"pull-right label ' + class_name + '\">' + ele.type + '</span></div>';
                contents += '</h2>';

                if (ele.fromName && ele.fromLink) {
                    contents += '<div class=\"search-from\">from <a href=\"' + ele.fromLink + '\">' + ele.fromName + '</a></div>';
                }

                contents += '<div class=\"search-description\">';

                // Add description, decode entities, and strip wrapping quotes
                if (ele.doc) {
                    text_content = \$('<p>' + ele.doc + '</p>').text();
                    if (text_content[0] == '\"') {
                        text_content = text_content.substring(1);
                    }
                    if (text_content[text_content.length - 1] == '\"') {
                        text_content = text_content.substring(0, text_content.length - 1);
                    }
                    contents += text_content;
                }

                contents += '</div></li>';
                container.append(\$(contents));
            }
        })();
    </script>
{% endblock %}
", 'search.twig', 'phar:///home/manuel/Code/scool/inventory_test/sami.phar/Sami/Resources/themes/default/search.twig');
    }
}