<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Don't allow direct access
/*
Plugin Name: Calculator profil de risc investitor
Plugin URI: https://nanotel.ro/
Description: Calculator profil de risc al investitorului
Author: Dragos Schiopu, Ionel Crisu
Version: 1.0
Author URI: https://dragosschiopu.ro/
*/

define('CALC_PDR_BASE_URL', plugins_url('',  __FILE__ ));

function calc_profil_de_risc_init() {
    calc_pdr_register_shortcodes();
}

function calc_pdr_register_shortcodes() {
    add_shortcode('calculator_profil_de_risc', 'calc_shortcode_profil_de_risc');
}

function calc_pdr_enqueueScripts() {
    wp_enqueue_script('jquery');

    wp_register_style('calc_pdr_css', CALC_PDR_BASE_URL . '/css/index.css');
    wp_enqueue_style('calc_pdr_css');

    wp_register_script('calc_pdr_js', CALC_PDR_BASE_URL . '/js/index.js', ['jquery'], 'v1', true);
    wp_enqueue_script('calc_pdr_js');
}

function calc_shortcode_profil_de_risc($atts, $content = null) {
    $params = shortcode_atts(array(
        'test_input_param' => null
    ), $atts);

    ob_start();
    ?>
	<div class="calc_wrapper">
	
		 <div class="calc_wapper_active">
		 	<h3> Chestionar pentru determinarea profilului de risc: </h3>
		 	
			<div class="input_holder"><h5>1. Ce dorești să obții în urma unei investiții?</h5>
				<input type="radio" class="select" id="r11"  name="a1" value="1">
				<label for="r11" >O investiție care nu ﬂuctuează în valoare.</label><br>
				<input type="radio" class="select" id="r12"  name="a1" value="2">
				<label for="r12">Sa păstrez valoarea investițiilor mele și să obțin venituri regulate.</label><br>
				<input type="radio" class="select" id="r13"  name="a1" value="3">
				<label for="r13">Obținerea unui venit periodic cu o oarecare expunere pe creșterea capitalului.</label><br>
				<input type="radio" class="select" id="r14"  name="a1" value="4">
				<label for="r14">Nu sunt îngrijorat de venituri, caut maximizarea creșterii investițiilor mele.</label>
		    </div>
		    
			<div class="input_holder"><h5>2. Pentru cât timp ești pregătit să păstrezi investițiile?</h5>
				<input type="radio" class="select" id="r21"  name="a2" value="1">
				<label for="r21">Doi ani sau mai puțin.</label><br>
				<input type="radio" class="select" id="r22"  name="a2" value="2">
				<label for="r22">Între trei și cinci ani.</label><br>
				<input type="radio" class="select" id="r23"  name="a2" value="3">
				<label for="r23">Între șase și zece ani.</label><br>
				<input type="radio" class="select" id="r24"  name="a2" value="4">
				<label for="r24">Mai mult de zece ani.</label>
		    </div>
		    
		    <div class="input_holder"><h5>3. Cum ai reacționa dacă valoarea investițiilor tale ar scădea cu 15% într-un an?</h5>
				<input type="radio" class="select" id="r31"  name="a3" value="1">
				<label for="r31">Ajutor! Scot toți banii și îi depun într-un cont de depozit bancar.</label><br>
				<input type="radio" class="select" id="r32"  name="a3" value="2">
				<label for="r32">Scot o parte din bani și-i plasez utilizând o strategie "sigură" de investiții.</label><br>
				<input type="radio" class="select" id="r33"  name="a3" value="3">
				<label for="r33">Aștept până când am recuperat pierderile și apoi iau în considerare alte investiții.</label><br>
				<input type="radio" class="select" id="r34"  name="a3" value="4">
				<label for="r34">Nu schimb nimic și urmez strategia recomandată.</label><br>
				<input type="radio" class="select" id="r35"  name="a3" value="5">
				<label for="r35">Wow! Este cu 15% mai ieftin să investesc mai mulți bani în același activ.</label>
		    </div>
		    
		    <div class="input_holder"><h5>4. Care este disponibilitatea ta de a risca pe termen scurt în perspectiva unor proﬁturi mai mari pe termen lung?</h5>
				<input type="radio" class="select" id="r41"  name="a4" value="1">
				<label for="r41">Scăzută.</label><br>
				<input type="radio" class="select" id="r42"  name="a4" value="2">
				<label for="r42">Nu sunt sigur.</label><br>
				<input type="radio" class="select" id="r43"  name="a4" value="3">
				<label for="r43">Moderată.</label><br>
				<input type="radio" class="select" id="r44"  name="a4" value="4">
				<label for="r44">Ridicată.</label>
		    </div>
		    
		    <div class="input_holder"><h5>5. Alege răspunsul cel mai adecvat pentru următoarea declarație: Sunt dispus să tolerez ﬂuctuații de piață în perspectiva unui potențial proﬁt mai mare.</h5>
				<input type="radio" class="select" id="r51"  name="a5" value="1">
				<label for="r51">Dezacord total.</label><br>
				<input type="radio" class="select" id="r52"  name="a5" value="2">
				<label for="r52">Dezacord parțial.</label><br>
				<input type="radio" class="select" id="r53"  name="a5" value="3">
				<label for="r53">Nu sunt de acord, nici in dezacord.</label><br>
				<input type="radio" class="select" id="r54"  name="a5" value="4">
				<label for="r54">Sunt de acord.</label><br>
		    </div>
		    
		    <div class="input_holder"><h5>6. Alege răspunsul pentru următoarea aﬁrmaţie: Principala mea preocupare o constituie sentimentul de siguranță; păstrarea banilor în condiții de siguranță este mai impor-tantă decât să câștig proﬁturi mari.</h5>
				<input type="radio" class="select" id="r61"  name="a6" value="1">
				<label for="r61">Complet de acord.</label><br>
				<input type="radio" class="select" id="r62"  name="a6" value="2">
				<label for="r62">Sunt de acord.</label><br>
				<input type="radio" class="select" id="r63"  name="a6" value="3">
				<label for="r63">Nu sunt de acord, nici în dezacord.</label><br>
				<input type="radio" class="select" id="r64"  name="a6" value="4">
				<label for="r64">Dezacord.</label><br>
		    </div>
		    
		    <div class="input_holder"><h5>7. În legătură cu investițiile, cât de experimentat crezi că ești?</h5>
				<input type="radio" class="select" id="r71"  name="a7" value="1">
				<label for="r71">Lipsit de experiență - investițiile sunt o experiență nouă pentru mine.</label><br>
				<input type="radio" class="select" id="r72"  name="a7" value="2">
				<label for="r72">Oarecum lipsit de experiență - a investi este destul de nou pentru mine.</label><br>
				<input type="radio" class="select" id="r73"  name="a7" value="3">
				<label for="r73">Oarecum experimentat – dețin deja cunoștințe.</label><br>
				<input type="radio" class="select" id="r74"  name="a7" value="4">
				<label for="r74">Experimentat - Cunosc factorii care fac investițiile să ﬂuctueze.</label><br>
				<input type="radio" class="select" id="r75"  name="a7" value="5">
				<label for="r75">Foarte experimentat - Îmi fac propria cercetare amplă și am o înțelegere excelentă a factorilor care afectează performanța investițiilor.</label>
		    </div>
		    
		    <div class="input_holder"><h5>8. Cât de sigur este venitul viitor (cum ar ﬁ de la salariu, pensie sau din alte investiții)?</h5>
				<input type="radio" class="select" id="r81"  name="a8" value="1">
				<label for="r81">Nu este sigur.</label><br>
				<input type="radio" class="select" id="r82"  name="a8" value="2">
				<label for="r82">Oarecum securizat.</label><br>
				<input type="radio" class="select" id="r83"  name="a8" value="3">
				<label for="r83">Destul de sigur.</label><br>
				<input type="radio" class="select" id="r84"  name="a8" value="4">
				<label for="r84">Foarte sigur.</label>
		    </div>
		    
		    <div class="input_holder"><h5>9. Cum ai descrie situația ta ﬁnanciară actuală?</h5>
				<input type="radio" class="select" id="r91"  name="a9" value="1">
				<label for="r91">Grad ridicat de îndatorare (cum ar ﬁ un credit ipotecar, carduri de credit și / sau de împrumut în marjă).</label><br>
				<input type="radio" class="select" id="r92"  name="a9" value="2">
				<label for="r92">Un credit ipotecar și anumite obligații.</label><br>
				<input type="radio" class="select" id="r93"  name="a9" value="3">
				<label for="r93">Un credit ipotecar rezonabil, dar nici o altă datorie.</label><br>
				<input type="radio" class="select" id="r94"  name="a9" value="4">
				<label for="r94">Fără credit ipotecar, dar alte câteva obligații (cum ar ﬁ datorii în contul cardului de credit, taxe de școlarizare).</label><br>
				<input type="radio" class="select" id="r95"  name="a9" value="5">
				<label for="r95">Complet fără datorii.</label>
		    </div>
		    
		    		    	        
     	</div>
     

    </div>         

    <div class="result">
		<a class="calculate_pdr_btn" href="#">CALCULEAZĂ</a>
		<div class="error_placeholder"></div>
		<div class="result_placeholder"></div>
	</div>
        
 
    <?php
    return ob_get_clean();
}

add_action('wp_enqueue_scripts', 'calc_pdr_enqueueScripts');
add_action('init', 'calc_profil_de_risc_init');
?>
