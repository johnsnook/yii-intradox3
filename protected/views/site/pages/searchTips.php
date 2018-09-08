<?php
/* @var $this SiteController */
//$this->layout = '//layouts/large';

$this->pageTitle = Yii::app()->name . ' - Document Search Tips';
?>

<div class="panel panel-default panel-roundy">
    <div class="panel-heading">
        <h1><span class="glyphicon glyphicon-file" data-toggle="tooltip" data-placement="right" data-original-title="Knowledge is invariably a matter of degree: you cannot put your finger upon even the simplest datum and say this we know. -T. S. Eliot"></span>&nbsp;Intradox Full Text Search Tips </h1>

    </div>
    <div class="panel-body">
        <div class="sect2" title="Known Operators">
            <div class="titlepage">
                <div>
                    <div>
                        <h1 class="title">Need help?</h1>
                    </div>
                </div>
            </div>
            <p>Intradox document search supports the following operators:</p>
            <div class="variablelist">
                <dl>
                    <dt>
                    <span class="term">Operator <code class="literal">AND</code>
                    </span>
                    </dt>
                    <dd>
                        <p>Default implicit operator. Matches when both of its two
                            arguments match. Example (with three keywords and two
                            implicit <code class="literal">AND</code> operators between them):</p>
                        <pre class="programlisting">
<span class="strong">
<strong>response deadline epa</strong> equivalent to response & deadline & epa
</span>
                        </pre>
                    </dd>
                    <dt>
                    <span class="term">Operator <code class="literal">OR</code>
                    </span>
                    </dt>
                    <dd>
                        <p>Matches when any of its two arguments match. Example:</p>
                        <a id="I_programlisting4_d1e4180">
                        </a>
                        <pre class="programlisting">
<span class="strong">
<strong>one | two</strong>
</span>
<span class="strong">
<strong>"sediment sample" | "neighborhood survey"</strong>
</span>
                        </pre>
                    </dd>
                    <dt>
                    <span class="term">Operator <code class="literal">NOT</code>
                    </span>
                    </dt>
                    <dd>
                        <p>Matches when the first argument matches, but the second one
                            does not. For compatibility
                            reasons, both <code class="literal">!</code> and <code class="literal">-</code> are recognized as <code class="literal">NOT</code>. Examples:</p>
                        <a id="I_programlisting4_d1e4206">
                        </a>
                        <pre class="programlisting">
<span class="strong">
<strong>shaken !stirred</strong>
</span>
<span class="strong">
<strong>shaken -stirred</strong>
</span>
                        </pre>
                    </dd>
                    <dt>
                    <span class="term">Grouping operator (parentheses)</span>
                    </dt>
                    <dd>
                        <p>Explicitly denotes the argument boundaries. Example:</p>
                        <a id="I_programlisting4_d1e4218">
                        </a>
                        <pre class="programlisting">
<span class="strong">
<strong>(sandy | rocky | loamy) attorney</strong>
</span>
<span class="strong">
<strong>mercury -(planet mercury)</strong>
</span>
                        </pre>
                    </dd>
                    <dt>
                    <span class="term">Field limit operator</span>
                    </dt>
                    <dd>
                        <p>Matches when its entire argument expression matches within a
                            specified field, or a part of a field, or a set of fields. The
                            operator is <code class="literal">@</code> and is followed
                            by the field name (in the most basic version). Examples:</p>
                        <a id="I_programlisting4_d1e4234">
                        </a>
                        <pre class="programlisting">
<span class="strong">
<strong>@title hello</strong>
</span>
<span class="strong">
<strong>@title letter @topic (soil | air) @</strong>
</span>
<span class="strong">
<strong>@(title,full_text) mercury (soil | air)</strong>
</span>
<span class="strong">
<strong>@* match me anywhere</strong> - the default
</span>
<span class="strong">
The full list of searchable fields:
<strong>    @title
    @author (aka corporate_author & personal_author(s))
    @topic
    @type
    @date (aka original_date)
    @notes
    @catno (aka catalog_number)
    @ext (aka file_extension)
    @text (aka full_text)
</strong>
</span>
Advanced examples:
<span class="strong">
<strong>@(title, topic) attorney @text "snarled then bit" @date 2004 @ext pdf </strong> - searches title and topic fields for attorney and the full text filed for exact the phrase "snarled then bit" and only docs with a 2004 date and oh yeah make it a PDF.
<strong>@!text "bloviating ceo"  @date (1999 | 1998)</strong> - searches for "bloviating ceo" in all fields EXCEPT text and within 1998-1999.
</span>
                        </pre>
                    </dd>
                    <dt>
                    <span class="term">Phrase operator</span>
                    </dt>
                    <dd>
                        <p>Matches when argument keywords match as an exact phrase.
                            Takes only keywords as arguments. Example:</p>
                        <a id="I_programlisting4_d1e4252">
                        </a>
                        <pre class="programlisting">
<span class="strong">
<strong>"Richard of York gave battle in vain"</strong>
</span>
<span class="strong">
<strong>"All your base are belong to us"</strong>
</span>
                        </pre>
                    </dd>
                    <dt>
                    <span class="term">Keyword proximity operator</span>
                    </dt>
                    <dd>
                        <p>Matches when all argument keywords that match are found
                            within a given limited distance. Takes only keywords as arguments.
                            Example:</p>
                        <a id="I_programlisting4_d1e4264">
                        </a>
                        <pre class="programlisting">
<span class="strong">
<strong>"breakfast Tiffany"~5</strong>
</span>
<span class="strong">
<strong>"Achilles tortoise"~10</strong>
</span>
                        </pre>
                    </dd>
                    <dt>
                    <span class="term">Quorum operator</span>
                    </dt>
                    <dd>
                        <p>Matches when at least <span class="emphasis">
                                <em>N</em>
                            </span> argument
                            keywords match, where <span class="emphasis">
                                <em>N</em>
                            </span> is a given threshold.
                            Takes only keywords as arguments. Example:</p>
                        <a id="I_programlisting4_d1e4282">
                        </a>
                        <pre class="programlisting">
<span class="strong">
<strong>"good fast cheap"/2</strong>
</span>
<span class="strong">
<strong>"single sane sexy smart"/3</strong>
</span>
                        </pre>
                    </dd>
                    <dt>
                    <span class="term">Strict order operator (operator <code class="literal">BEFORE</code>)</span>
                    </dt>
                    <dd>
                        <p>Matches when its two arguments not only match, but also
                            occur in exactly the same order as in the operator.
                            Example:</p>
                        <a id="I_programlisting4_d1e4297">
                        </a>
                        <pre class="programlisting">
<span class="strong">
<strong>ladies &lt;&lt; first</strong>
</span>
<span class="strong">
<strong>north &lt;&lt; (east | west)</strong>
</span>
                        </pre>
                    </dd>
                    <dt>
                    <span class="term">
                        <code class="literal">NEAR</code> operator</span>
                    </dt>
                    <dd>
                        <p>Matches when its two arguments not only match, but also
                            occur within a given limited distance from each other.
                            Example:</p>
                        <a id="I_programlisting4_d1e4311">
                        </a>
                        <pre class="programlisting">
<span class="strong">
<strong>bill NEAR/5 monica</strong>
</span>
<span class="strong">
<strong>(red | black) NEAR/5 (hat | coat)</strong>
</span>
                        </pre>
                    </dd>
                    <dt>
                    <span class="term">
                        <code class="literal">SENTENCE</code> operator</span>
                    </dt>
                    <dd>
                        <p>Matches when its two arguments not only match, but also
                            occur within the same sentence. Takes only keywords and phrases as
                            arguments. Requires the sentence and paragraph indexing feature
                            (the <code class="literal">index_sp</code> directive) to be
                            enabled. Example:</p>
                        <a id="I_programlisting4_d1e4328">
                        </a>
                        <pre class="programlisting">
<span class="strong">
<strong>pizza SENTENCE anchovies</strong>
</span>
<span class="strong">
<strong>acquisitions SENTENCE "fiscal year"</strong>
</span>
                        </pre>
                    </dd>
                    <dt>
                    <span class="term">
                        <code class="literal">PARAGRAPH</code> operator</span>
                    </dt>
                    <dd>
                        <p>Matches when its two arguments not only match, but also
                            occur within the same paragraph. Takes only keywords and phrases
                            as arguments. Requires the sentence and paragraph indexing feature
                            to be enabled. Example:</p>
                        <a id="I_programlisting4_d1e4343">
                        </a>
                        <pre class="programlisting">
<span class="strong">
<strong>light PARAGRAPH darkness</strong>
</span>
<span class="strong">
<strong>"harley davidson" PARAGRAPH "marlboro man"</strong>
</span>
                        </pre>
                    </dd>

                </dl>
            </div>
            <p>More operators might be implemented over time, so this list isn’t
                carved in stone.</p>
        </div>

    </div>




</div>
