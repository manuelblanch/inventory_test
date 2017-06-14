<?php

/* interfaces.twig */
class __TwigTemplate_4a4993f022c3ec5dbec11efc087e353be9bb3e8b089ae04e6d9ef02450e99653 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate('layout/layout.twig', 'interfaces.twig', 1);
        $this->blocks = [
            'title'        => [$this, 'block_title'],
            'body_class'   => [$this, 'block_body_class'],
            'page_content' => [$this, 'block_page_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        return 'layout/layout.twig';
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 2
        $context['__internal_2c75c615ca474795e9c5e07b577eb95fb00bdf7d9eee9f581c21a825b4272324'] = $this->loadTemplate('macros.twig', 'interfaces.twig', 2);
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        echo 'Interfaces | ';
        $this->displayParentBlock('title', $context, $blocks);
    }

    // line 4
    public function block_body_class($context, array $blocks = [])
    {
        echo 'interfaces';
    }

    // line 6
    public function block_page_content($context, array $blocks = [])
    {
        // line 7
        echo '    <div class="page-header">
        <h1>Interfaces</h1>
    </div>

    ';
        // line 11
        echo $context['__internal_2c75c615ca474795e9c5e07b577eb95fb00bdf7d9eee9f581c21a825b4272324']->macro_render_classes((isset($context['interfaces']) || array_key_exists('interfaces', $context) ? $context['interfaces'] : (function () {
            throw new Twig_Error_Runtime('Variable "interfaces" does not exist.', 11, $this->getSourceContext());
        })()));
        echo '
';
    }

    public function getTemplateName()
    {
        return 'interfaces.twig';
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return [55 => 11,  49 => 7,  46 => 6,  40 => 4,  33 => 3,  29 => 1,  27 => 2,  11 => 1];
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends \"layout/layout.twig\" %}
{% from \"macros.twig\" import render_classes %}
{% block title %}Interfaces | {{ parent() }}{% endblock %}
{% block body_class 'interfaces' %}

{% block page_content %}
    <div class=\"page-header\">
        <h1>Interfaces</h1>
    </div>

    {{ render_classes(interfaces) }}
{% endblock %}
", 'interfaces.twig', 'phar:///home/manuel/Code/scool/inventory_test/sami.phar/Sami/Resources/themes/default/interfaces.twig');
    }
}
