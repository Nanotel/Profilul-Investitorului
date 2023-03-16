"use strict";
(function() {

    function CalculatorPDR() {

        const _this = this;

        jQuery('.calculate_pdr_btn').click(function(event) {
            event.preventDefault();
            _this.updateResult();
        })

        this.updateResult = function() {
            jQuery('.error_placeholder').empty();
            jQuery('.result_placeholder').empty();

            let totalVal = 0;
            const a1result = parseInt(this['a1'], 10);
            const a2result = parseInt(this['a2'], 10);
            const a3result = parseInt(this['a3'], 10);
            const a4result = parseInt(this['a4'], 10);
            const a5result = parseInt(this['a5'], 10);
            const a6result = parseInt(this['a6'], 10);
            const a7result = parseInt(this['a7'], 10);
            const a8result = parseInt(this['a8'], 10);
            const a9result = parseInt(this['a9'], 10);

            if (!Number.isNaN(a1result)) {
                totalVal += a1result;
            }
            if (!Number.isNaN(a2result)) {
                totalVal += a2result;
            }
            if (!Number.isNaN(a3result)) {
                totalVal += a3result;
            }
            if (!Number.isNaN(a4result)) {
                totalVal += a4result;
            }
            if (!Number.isNaN(a5result)) {
                totalVal += a5result;
            }
            if (!Number.isNaN(a6result)) {
                totalVal += a6result;
            }
            if (!Number.isNaN(a7result)) {
                totalVal += a7result;
            }
            if (!Number.isNaN(a8result)) {
                totalVal += a8result;
            }
            if (!Number.isNaN(a9result)) {
                totalVal += a9result;
            }

            const atLeastOneisMissing = Number.isNaN(a1result) || Number.isNaN(a2result) || Number.isNaN(a3result) || Number.isNaN(a4result) || Number.isNaN(a5result) || Number.isNaN(a6result) || Number.isNaN(a7result) || Number.isNaN(a8result) || Number.isNaN(a9result);
            if (atLeastOneisMissing) {
                const errorHtml = `
                <div style="color: red;">Nu ai raspuns la toate intrebările!!!</div>
                `;
                jQuery(errorHtml).appendTo(jQuery('.error_placeholder'));
                return;
            }


			if (totalVal <= 11) {
				var tip_profil = `
		        <div class='rezultat_profil'>
		        <div><h2>Tip investitor: <span>DEFENSIV</span></div>
		        <p>Urmărește protejarea capitalului – Nivel de risc foarte scăzut</p>
		        <p>Obiectivul investițional principal este acela de a păstra capitalul sau valoarea principalului investit. Vrei să obții un flux de venituri previzibil din activele tale. Astfel, găsești mai potrivit să investești în produse cu scadențe fixe și rentabilitate prestabilită. Creșterea capitalului este de o importanță secundară. Ești dispus să îți asumi riscuri limitate cu activele tale, de obicei, într-un orizont de timp scurt investițional.</p>
		        </div>
		        `;
			} else if (totalVal <= 18) {
				var tip_profil = `
		        <div class='rezultat_profil'>
		        <div><h2>Tip investitor: <span>CONSERVATOR</span></div>
		        <p>Urmărește o creștere treptată a capitalului – Nivel de risc scăzut</p>	
		        <p>Principalul scop investițional este de a obține un venit relativ stabil și moderat. Ești dispus să îți asumi un nivel redus de risc cu activele în care investești. În plan secundar, îți dorești o creștere graduală a averii pe termen lung</p>	        
		        </div>
		        `;
			} else if (totalVal <= 25) {
				var tip_profil = `
		        <div class='rezultat_profil'>
		        <div><h2>Tip investitor: <span>ECHILIBRAT</span></div>
		        <p>Urmărește niveluri moderate ale riscului și rentabilității</p>	
		        <p>Scopul principal este realizarea unei creșteri a capitalului pe termen lung. Cauți randamente relativ stabile, dar nu te deranjează asumarea unor riscuri moderate. Portofoliul echilibrat se realizează prin investirea în proporții egale în obligațiuni și acțiuni.</p>        
		        </div>
		        `;
			} else if (totalVal <= 33) {
				var tip_profil = `
		        <div class='rezultat_profil'>
		        <div><h2>Tip investitor: <span>DINAMIC</span></div>
		        <p>Urmărește un potențial de creștere pe termen lung</p>	
       			<p>Vrei să-ți crești averea pe termen lung. Ești dispus să-ți asumi mai multe riscuri deoarece îţi doreşti profituri mai mari. Ești conștient că acțiunile pot fluctua pe termen scurt, dar consideri că o scădere temporară a investiției este o oportunitate de cumpărare. Portofoliul dinamic include de obicei investiții cu o varietate de clase de active, cu un procent mai ridicat alocat investițiilor în fonduri de investiții, acțiuni și alte instrumente financiare cu risc ceva mai ridicat. Depozitele bancare și obligațiunile au o pondere mai mică în portofoliu. </p>	
		        </div>
		        `;
			} else {
				var tip_profil = `
		        <div class='rezultat_profil'>
		        <div><h2>Tip investitor: <span>AGRESIV</span></div>
		        <p>Urmărește o creștere pe termen foarte lung</p>
		        <p>Prioritatea ta este de a genera câștiguri de capital. Realizezi că, în timp, piețele de capital înregistrează de obicei o performanţă mai bună în comparaţie cu alte investiții. Nu îți este teamă de speculații sau să investești în sectoare economice riscante. Consideri că o scădere a pieței/un regres temporar reprezintă o oportunitate de cumpărare. O mare parte a portofoliului unui astfel de investitor este de obicei format din acțiuni și alte active cu grad mai ridicat de risc></p>	 
		        </div>
		        `;
			}

	

            const html = `
            <div class='rezultat_final'>
            <div><h2>Scor total: <span>${totalVal}</span></h2>
            </div>
            </div>
            `;
            
            const rezultat = html + tip_profil;
            
            jQuery(rezultat).appendTo(jQuery('.result_placeholder'));
        }

        this.updateValue = function(nameKey, val) {
            this[nameKey] = val;
        }

        this.init = function() {
            const _this = this;
            jQuery('input[type=radio][name=a1]').change(function() {
                _this.updateValue(jQuery(this).attr('name'), this.value);
            });
            jQuery('input[type=radio][name=a2]').change(function() {
                _this.updateValue(jQuery(this).attr('name'), this.value);
            });
            jQuery('input[type=radio][name=a3]').change(function() {
                _this.updateValue(jQuery(this).attr('name'), this.value);
            });
            jQuery('input[type=radio][name=a4]').change(function() {
                _this.updateValue(jQuery(this).attr('name'), this.value);
            });
            jQuery('input[type=radio][name=a5]').change(function() {
                _this.updateValue(jQuery(this).attr('name'), this.value);
            });
            jQuery('input[type=radio][name=a6]').change(function() {
                _this.updateValue(jQuery(this).attr('name'), this.value);
            });
            jQuery('input[type=radio][name=a7]').change(function() {
                _this.updateValue(jQuery(this).attr('name'), this.value);
            });
            jQuery('input[type=radio][name=a8]').change(function() {
                _this.updateValue(jQuery(this).attr('name'), this.value);
            });
            jQuery('input[type=radio][name=a9]').change(function() {
                _this.updateValue(jQuery(this).attr('name'), this.value);
            });
        }
    }

    jQuery(document).ready(function() {
        new CalculatorPDR().init();
    });
})()
