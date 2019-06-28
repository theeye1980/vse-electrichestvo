function calculate1() {
 seq = parseFloat(document.form.seq.value);
 if (seq==96) doe96();
 if (seq==24) doe24();
}

function doe96() {
 res1 = new Array (.1,.102,.105,.107,.11,.113,.115,.118,.121,.124,.127,.13,.133,.137,.14,.143,.147,.15,.154,.158,.162,.165,.169,.174,.178,.182,.187,.191,.196,.2,.205,.21,.215,.221,.226,.232,.237,.243,.249,.255,.261,.267,.274,.28,.287,.294,.301,.309,.316,.324,.332,.34,.348,.357,.365,.374,.383,.392,.402,.412,.422,.432,.442,.453,.464,.475,.487,.499,.511,.523,.536,.549,.562,.576,.59,.604,.619,.634,.649,.665,.681,.698,.715,.732,.75,.768,.787,.806,.825,.845,.866,.887,.909,.931,.953,.976,1,1.02,1.05,1.07,1.1,1.13,1.15,1.18,1.21,1.24,1.27,1.3,1.33,1.37,1.4,1.43,1.47,1.5,1.54,1.58,1.62,1.65,1.69,1.74,1.78,1.82,1.87,1.91,1.96,2,2.05,2.1,2.15,2.21,2.26,2.32,2.37,2.43,2.49,2.55,2.61,2.67,2.74,2.8,2.87,2.94,3.01,3.09,3.16,3.24,3.32,3.4,3.48,3.57,3.65,3.74,3.83,3.92,4.02,4.12,4.22,4.32,4.42,4.53,4.64,4.75,4.87,4.99,5.11,5.23,5.36,5.49,5.62,5.76,5.9,6.04,6.19,6.34,6.49,6.65,6.81,6.98,7.15,7.32,7.5,7.68,7.87,8.06,8.25,8.45,8.66,8.87,9.09,9.31,9.53,9.76,10,10.2,10.5,10.7,11,11.3,11.5,11.8,12.1,12.4,12.7,13,13.3,13.7,14,14.3,14.7,15,15.4,15.8,16.2,16.5,16.9,17.4,17.8,18.2,18.7,19.1,19.6,20,20.5,21,21.5,22.1,22.6,23.2,23.7,24.3,24.9,25.5,26.1,26.7,27.4,28,28.7,29.4,30.1,30.9,31.6,32.4,33.2,34,34.8,35.7,36.5,37.4,38.3,39.2,40.2,41.2,42.2,43.2,44.2,45.3,46.4,47.5,48.7,49.9,51.1,52.3,53.6,54.9,56.2,57.6,59,60.4,61.9,63.4,64.9,66.5,68.1,69.8,71.5,73.2,75,76.8,78.7,80.6,82.5,84.5,86.6,88.7,90.9,93.1,95.3,97.6);
 res2 = new Array (1,1.02,1.05,1.07,1.1,1.13,1.15,1.18,1.21,1.24,1.27,1.3,1.33,1.37,1.4,1.43,1.47,1.5,1.54,1.58,1.62,1.65,1.69,1.74,1.78,1.82,1.87,1.91,1.96,2,2.05,2.1,2.15,2.21,2.26,2.32,2.37,2.43,2.49,2.55,2.61,2.67,2.74,2.8,2.87,2.94,3.01,3.09,3.16,3.24,3.32,3.4,3.48,3.57,3.65,3.74,3.83,3.92,4.02,4.12,4.22,4.32,4.42,4.53,4.64,4.75,4.87,4.99,5.11,5.23,5.36,5.49,5.62,5.76,5.9,6.04,6.19,6.34,6.49,6.65,6.81,6.98,7.15,7.32,7.5,7.68,7.87,8.06,8.25,8.45,8.66,8.87,9.09,9.31,9.53,9.76);
 e = 96
 calculate2();
 }

function doe24() {
 res1 = new Array (.1,.11,.12,.13,.15,.16,.18,.2,.22,.24,.27,.3,.33,.36,.39,.43,.47,.51,.56,.62,.68,.75,.82,.91,1.0,1.1,1.2,1.3,1.5,1.6,1.8,2.0,2.2,2.4,2.7,3.0,3.3,3.6,3.9,4.3,4.7,5.1,5.6,6.2,6.8,7.5,8.2,9.1,10,11,12,13,15,16,18,20,22,24,27,30,33,36,39,43,47,51,56,62,68,75,82,91);
 res2 = new Array (1.0,1.1,1.2,1.3,1.5,1.6,1.8,2.0,2.2,2.4,2.7,3.0,3.3,3.6,3.9,4.3,4.7,5.1,5.6,6.2,6.8,7.5,8.2,9.1);
 e = 24
 calculate2();
 }

function calculate2() {
 clear1()
 var r_div1 = new Array (100)
 var r_div2 = new Array (100)
 var min_diff = 1
 var decade = 1
 var seed_decade = 1
 var i, j, k, l, div, diff, seed, real_div, real_div_2, error, input_voltage, output_voltage, test_ratio
 input_voltage = parseFloat(document.form.input_voltage.value)
 output_voltage = parseFloat(document.form.output_voltage.value)
 ratio = output_voltage / input_voltage
 seed = parseFloat(document.form.seed.value)
 if (ratio == .5) alert ("All that is required" + '\n' + "for a ratio of 1/2" + '\n' + "is that R1 = R2");
 if (input_voltage / output_voltage <= 1.009) alert ("Величина напряжения на входе слишком мала!");
 if (input_voltage / output_voltage >= 100 && e == 96) alert ("Величина напряжения на входе слишком велика");
 if (input_voltage / output_voltage >= 93 && e == 24) alert ("Voltage ratio too high");
 for (i = 0 ; i < res1.length ; i++) {
 for (j = 0 ; j < res2.length ; j++) {
 test_ratio = res2[j] / (res1[i] + res2[j])
 diff = Math.abs(ratio - test_ratio)
 if (diff <= min_diff) min_diff = diff
 }
 }
 k = 0
 for (i = 0 ; i < res1.length ; i++) {
 for (j = 0 ; j < res2.length ; j++) {
 test_ratio = res2[j] / (res1[i] + res2[j])
 diff = Math.abs(ratio - test_ratio)
 if (diff == min_diff) {
 r_div1[k] = res1[i]
 r_div2[k] = res2[j]
 k = k + 1
 }
 }
 }
 if (r_div1[0] > 0) {
 document.form.c0.value = r_div1[0] * seed
 document.form.r0.value = r_div2[0] * seed
 document.form.caption0.value = "выбор 1"
 }
 if (r_div1[1] > 0) {
 document.form.c1.value = r_div1[1] * seed
 document.form.r1.value = r_div2[1] * seed
 document.form.caption1.value = "выбор 2"
 }
 if (r_div1[2] > 0) {
 document.form.c2.value = r_div1[2] * seed
 document.form.r2.value = r_div2[2] * seed
 document.form.caption2.value = "выбор 3"
 }
 if (r_div1[3] > 0) {
 document.form.c3.value = r_div1[3] * seed
 document.form.r3.value = r_div2[3] * seed
 document.form.caption3.value = "выбор 4"
 }
 if (r_div1[4] > 0) {
 document.form.c4.value = r_div1[4] * seed
 document.form.r4.value = r_div2[4] * seed
 document.form.caption4.value = "выбор 5"
 }
 if (r_div1[5] > 0) {
 document.form.c5.value = r_div1[5] * seed
 document.form.r5.value = r_div2[5] * seed
 document.form.caption5.value = "выбор 6"
 }
 if (r_div1[6] > 0) {
 document.form.c6.value = r_div1[6] * seed
 document.form.r6.value = r_div2[6] * seed
 document.form.caption6.value = "выбор 7"
 }
 if (r_div1[7] > 0) {
 document.form.c7.value = r_div1[7] * seed
 document.form.r7.value = r_div2[7] * seed
 document.form.caption7.value = "выбор 8"
 }
 if (r_div1[8] > 0) {
 document.form.c8.value = r_div1[8] * seed
 document.form.r8.value = r_div2[8] * seed
 document.form.caption8.value = "выбор 9"
 }
 if (r_div1[9] > 0) {
 document.form.c9.value = r_div1[9] * seed
 document.form.r9.value = r_div2[9] * seed
 document.form.caption9.value = "выбор 10"
 }
 real_output = (r_div2[0] / (r_div1[0] + r_div2[0])) * input_voltage
 document.form.real_output.value = real_output
 error = (real_output - output_voltage) / output_voltage * 100
 document.form.error.value = error
}

function clear1() {
 document.form.c0.value = ""
 document.form.r0.value = ""
 document.form.c1.value = ""
 document.form.r1.value = ""
 document.form.c2.value = ""
 document.form.r2.value = ""
 document.form.c3.value = ""
 document.form.r3.value = ""
 document.form.c4.value = ""
 document.form.r4.value = ""
 document.form.c5.value = ""
 document.form.r5.value = ""
 document.form.c6.value = ""
 document.form.r6.value = ""
 document.form.c7.value = ""
 document.form.r7.value = ""
 document.form.c8.value = ""
 document.form.r8.value = ""
 document.form.c9.value = ""
 document.form.r9.value = ""
 document.form.real_output.value = ""
 document.form.error.value = ""
 document.form.caption0.value = ""
 document.form.caption1.value = ""
 document.form.caption2.value = ""
 document.form.caption3.value = ""
 document.form.caption4.value = ""
 document.form.caption5.value = ""
 document.form.caption6.value = ""
 document.form.caption7.value = ""
 document.form.caption8.value = ""
 document.form.caption9.value = ""
}