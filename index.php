<?php include('head.php'); ?>

<article class="article-utility">
	
	<section class="section-article">

		<h2>Variations Proposal Introduction</h2>

		<p>This guide was prepared in July 2017 for presentation to the public, the specification’s owners, and the OpenType Variations working group. Our goal is to record what we have learned about variable fonts and have put into practice, which we believe will be generally useful to the specification, and to propose a new, systematic approach to registering and using axes.</p>
		<p>This proposal does not seek to classify the designs of typefaces parametrically, only what the values of the parameters are. Furthermore, it is offered as a beginning, suggesting the need for—but not containing—suggestions for many important attributes of non-Latin fonts. </p>
		<p>The registration of the axes here is also intended to be used as part of a system including the registration of what function an axis performs for programs and/or users along the existing path from script selection to the rendered glyph in a document, aka the Mantra. Documentation of that part of the system, including the registration of what function an axis provides, is still in development and will follow soon.</p>

		<h3>A. Primary Type Axes</h3>
		<p>Type users are familiar with the attributes of a typeface family that combine to make up its appearance. Traditionally, these attributes are available as named and instantiated styles in font families. Some of these attributes are already recorded in fonts conforming to the OpenType v1.0 specification, as values in the OS/2 table, and in other tables of the SFNT format in general.</p>
		<p>Today's font families contain instances pertaining to attributes of registered axes of OpenType, like width, weight, and optical size. In addition, some existing font families contain instances pertaining to grades, descender length, multiscript font mixing for different vertical proportions, and font families contain instances made for specific output, or with specific data to suite particular platform requirements. </p>
		<p>This proposal is for a new and more complete set of typographic axes, with a unified value system, concern for non-Latin, responsive typography, compression, and more. The registration of a full set of attributes allows type developers to combine the modern, potentially much larger font family into a single file; it allows software developers and educators to have a clearer picture of how typography is shaped by the basic attributes; and it allows type users to control the attributes more precisely, whether that control is programmatic or manual via a user interface.</p>

		<h3>B. Treatment Axes</h3>
		<p>Many treatments of typography—outlining or underlining, as well as adding drop shadows and more—are currently available to users via page description languages and applications, where only a uniform, size-independent transformation of all the glyphs of an instance is the result. </p>
		<p>Because fonts usually provide a better solution than smearing regular type for “bold” or “obliquing” it for “italic,” and because optical size (the most common treatment of all) is a registered axis, variation axes can provide these and other treatments better than applications. This gives users more precise control per treatment, and per glyph, while also informing applications that these axes exist, and what their value systems are. It also relieves apps from having to provide the treatment, should the user desire to do so, with the font providing the means.</p>

		<h3>C. Non-Latin Axes</h3>
		<p>Today’s multiscript type designer faces two major options when mixing more than one script in a typeface family: to compromise one or both scripts to the ideals of the other; or, alternatively, to make multiple instances of the font to provide uncompromised versions of each. </p>
		<p>The compromises occur in all of the typographic parameters listed in <b>A. Primary Type Axes</b>, and surface in the choices that need to be made in presenting a unified appearance of width, weight, and height among glyphs of different scripts. These compromises come in a variety of sizes, from small (as when Latin and Cyrillic need to work together) to large (as when Chinese and Arabic have to work together). And, of course, there are the supersized compromises in OS fonts, where the typeface family contains fifty-three scripts.</p>
		<p>In these scenarios, the type developer is challenged to come up with a single harmonious solution, per size, to the weights and widths of each glyph, in order to form the correct relationship between transparent and opaque across all of the glyphs of the scripts involved. If users don’t like the type designer’s solutions, they are free to roam the width and weight axes and either programmatically or manually redefine the interscript solutions to weight and width. It’s important to understand that this option is open to the type developer and user without script-specific opaque and transparent attributes, because the proper weight and width per style are solvable in the hands of developers and users without registered weight axes for every script. </p>
		<p>Alignments operate differently in typography. So in variable fonts, they must be able to operate independently of one another at any given weight, width, and size, ahead of whatever decisions occur in those attributes. Until now, all of the scripts of Unicode have shared what could be read as Latin alignments in the OpenType spec. </p>
		<p>This proposal does not prevent type developers from continuing to share one set of registered alignments among all the scripts of Unicode. Rather, it suggests that if variable font developers want to maintain compression, performance, and quality in multiscript design, then registered axes for the alignments specific to each script are required. And Chinese alignment values that are definable independently of Latin alignment values are a good place to start.</p>

		<h3>D. Motion Axes</h3>
		<p>The essence of designing realistic motion in media with variable fonts requires giving users and programs a simple solution to the following equation: Distance = Rate × Time. The proposed axes enable type developers to define the distances their animations move per cycle of animation, so motion-graphics designers can solve this equation relative to size of use without trial and error on each glyph.</p>
		<p>As variations will undoubtedly be put to the task of animation, these axes create a common meeting point between design and use.</p>

		<h3>E. Glyph Axes</h3>
		<p>The existing OpenType specification allows composites—i.e., reference from a glyph to use another glyph, possibly repositioned or otherwise transformed—to save space and time when developing fonts that repeatedly use the same shape. </p>
		<p>In traditional typefounding, a font developer would not hesitate to create fractions by using a glyph from a smaller master of the same style. In variable fonts, using the same contours of a glyph repeatedly (with deltas for weight, width, and optical size) opens up the possibility of using those and other instances for many such purposes, but only if the developer can pinpoint the instance location ​​of particular glyphs, or glyphs of a particular feature, along a registered axis.</p>
	
		<hr>
		
	</section>
	
</article>

<script src="https://d3js.org/d3.v3.min.js"></script>
<script type="text/javascript"charset="utf-8">
	$(document).ready(function() {
		"use strict";
		d3.text("https://docs.google.com/spreadsheets/d/e/2PACX-1vRl0zD7-mCywXYoFXbW55hdGqNY0XxPFUZAfuD6OJDfYPM5eBaQWc3wpQi1RdBQmoCgoWT3OX7iZXXu/pub?gid=0&single=true&output=csv", function(string) {
			var data = d3.csv.parse(string, function(d) {
				return {
					index: +d.index,
					release: d.Release,
					tag: d.Tag,
					name: d.Name,
					description: d.Description,
					range: d['Valid numeric range'],
					scale: d['Scale interpretation'],
					recommended_value: d['Recommended ‘normal’ value'],
					suggested_programmatic: d['Suggested programmatic interactions'],
					suggested_user: d['Suggested user interactions'],
					blend_participant: d['Blend participant'],
					demo: d.Demo,
				};
			});
			var section = $("section");
			$.each(data, function(index, value) {
				var html = "";
				html+="<h3 id='"+value.tag+"'>"+value.index+". "+value.tag+"</h3>\n";
				html+="<p>\n";
				html+="<b>Tag:</b> "+value.tag+"<br>\n";
				html+="<b>Name:</b> "+value.name+"<br>\n";
				html+="<b>Description:</b> "+value.description+"<br>\n";
				html+="<b>Valid numeric range:</b> "+value.range+"<br>\n";
				html+="<b>Scale interpretation:</b> "+value.scale+"<br>\n";
				html+="<b>Recommended “normal” value:</b> "+value.recommended_value+"<br>\n";
				html+="<b>Suggested programmatic interactions:</b> "+value.suggested_programmatic+"<br>\n";
				html+="<b>Suggested user interactions:</b> "+value.suggested_user+"<br>\n";
				/* Don't render Related axis information for now
				html+="<b>Related axis information:</b> "+value.blend_participant+"<br>\n";
				*/
				html+="</p>\n";
				html+="<h4>Demo</h4>\n";
				html+="<img src='images/animation-"+value.tag+".gif'>\n";
				html+="<hr>\n";
				section.append(html);
			});
		});
	});
</script>

<?php include('foot.php'); ?>
