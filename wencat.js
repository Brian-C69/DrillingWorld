
/* global parseFloat */

// Wait for the DOM content to be fully loaded
document.addEventListener('DOMContentLoaded', function() {
    // Check if the current page is page1.php
    if (window.location.pathname.includes("WenCatWBM-SBM-DIF.php")) {
        calculate1();
    }
    // Check if the current page is page2.php
    else if (window.location.pathname.includes("WenCatFormulations.php")) {
        calculate();
    }
    // Check if the current page is page3.php
    else if (window.location.pathname.includes("VolCalWBM-SBM-DIF.php")) {
        calculate2();
    }
    // Check if the current page is page3.php
    else if (window.location.pathname.includes("WenCatWBM-DIF.php")) {
        calculate3();
    }
        // Check if the current page is page3.php
    else if (window.location.pathname.includes("VolCalWBM-DIF.php")) {
        calculate4();
    }
});

function getValue(id) {
    return parseFloat(document.getElementById(id).value) || 0;
}

function getUnit(id) {
    return document.getElementById(id).textContent;
}

function getCost(id) {
    return parseFloat(document.getElementById(id).textContent);
}

// Function to convert various units to a common unit (BBLS)
function convertToBBLS(ppb, unit) {
    switch (unit) {
        case "1 MT":
            return ppb / 2200;
        case "10 lb/sxs":
            return ppb / 10;
        case "15 lb/sxs":
            return ppb / 15;
        case "25 lb/sxs":
            return ppb / 25;
        case "40 lb/sxs":
            return ppb / 40;
        case "50 lb/sxs":
            return ppb / 50;
        case "55 lb/sxs":
            return ppb / 55;
        case "20 kg/sxs":
            return ppb / 2.2 / 20;
        case "25 kg/sxs":
            return ppb / 2.2 / 25;
        case "50 kg/sxs":
            return ppb / 2.2 / 50;
        case "5 gal/drum":
            return ppb / 2.2 / 20;
        case "55 gal/drum":
            return ppb / 2.2 / 200;
        case "200 ltr/drum":
            return ppb / 2.2 / 200;
        case "1000 ltr/bb":
            return ppb / 2.2 / 1000;
        case "220 kg/drum":
            return ppb / 2.2 / 220;
        case "225 kg/drum":
            return ppb / 2.2 / 225;
        case "BBLS":
            return ppb;
        default:
            console.error("Unknown unit type: " + unit);
            return NaN; // Return a special value to indicate an error
    }
}

function calculate() {
    var numItems = 59; // Assuming you have 59 items

    var ppbs = [];
    var units = [];
    var costs = [];
    var costBBLs = [];

    // Get values for ppb, unit, and cost
    for (var i = 1; i <= numItems; i++) {
        ppbs.push(getValue('ppb' + i));
        units.push(getUnit('unit' + i));
        costs.push(getCost('cost' + i));
    }

    // Calculate quantity and costBBL for each item
    for (var j = 0; j < numItems; j++) {
        var quantity = convertToBBLS(ppbs[j], units[j]);
        document.getElementById('quantity' + (j + 1)).textContent = quantity.toFixed(4);
        var costBBL = costs[j] * quantity;
        costBBLs.push(costBBL); // Store costBBL value
    }

    // Display the result
    document.getElementById('costBBL1').textContent = costBBLs[0].toFixed(2);
    document.getElementById('costBBL2').textContent = costBBLs[1].toFixed(2);
    document.getElementById('costBBL3').textContent = costBBLs[2].toFixed(2);
    document.getElementById('costBBL4').textContent = costBBLs[3].toFixed(2);
    document.getElementById('costBBL5').textContent = costBBLs[4].toFixed(2);

    document.getElementById('costBBL6').textContent = costBBLs[5].toFixed(2);
    document.getElementById('costBBL7').textContent = costBBLs[6].toFixed(2);
    document.getElementById('costBBL8').textContent = costBBLs[7].toFixed(2);
    document.getElementById('costBBL9').textContent = costBBLs[8].toFixed(2);
    document.getElementById('costBBL10').textContent = costBBLs[9].toFixed(2);
    document.getElementById('costBBL11').textContent = costBBLs[10].toFixed(2);
    document.getElementById('costBBL12').textContent = costBBLs[11].toFixed(2);

    document.getElementById('costBBL13').textContent = costBBLs[12].toFixed(2);
    document.getElementById('costBBL17').textContent = costBBLs[13].toFixed(2);
    document.getElementById('costBBL21').textContent = costBBLs[14].toFixed(2);
    document.getElementById('costBBL25').textContent = costBBLs[15].toFixed(2);
    document.getElementById('costBBL29').textContent = costBBLs[16].toFixed(2);
    document.getElementById('costBBL33').textContent = costBBLs[17].toFixed(2);
    document.getElementById('costBBL37').textContent = costBBLs[18].toFixed(2);
    document.getElementById('costBBL41').textContent = costBBLs[19].toFixed(2);
    document.getElementById('costBBL45').textContent = costBBLs[20].toFixed(2);

    document.getElementById('costBBL14').textContent = costBBLs[12].toFixed(2);
    document.getElementById('costBBL18').textContent = costBBLs[13].toFixed(2);
    document.getElementById('costBBL22').textContent = costBBLs[14].toFixed(2);
    document.getElementById('costBBL26').textContent = costBBLs[15].toFixed(2);
    document.getElementById('costBBL30').textContent = costBBLs[16].toFixed(2);
    document.getElementById('costBBL34').textContent = costBBLs[17].toFixed(2);
    document.getElementById('costBBL38').textContent = costBBLs[18].toFixed(2);
    document.getElementById('costBBL42').textContent = costBBLs[19].toFixed(2);
    document.getElementById('costBBL46').textContent = costBBLs[21].toFixed(2);

    document.getElementById('costBBL15').textContent = costBBLs[12].toFixed(2);
    document.getElementById('costBBL19').textContent = costBBLs[13].toFixed(2);
    document.getElementById('costBBL23').textContent = costBBLs[14].toFixed(2);
    document.getElementById('costBBL27').textContent = costBBLs[15].toFixed(2);
    document.getElementById('costBBL31').textContent = costBBLs[16].toFixed(2);
    document.getElementById('costBBL35').textContent = costBBLs[17].toFixed(2);
    document.getElementById('costBBL39').textContent = costBBLs[18].toFixed(2);
    document.getElementById('costBBL43').textContent = costBBLs[19].toFixed(2);
    document.getElementById('costBBL47').textContent = costBBLs[22].toFixed(2);

    document.getElementById('costBBL16').textContent = costBBLs[12].toFixed(2);
    document.getElementById('costBBL20').textContent = costBBLs[13].toFixed(2);
    document.getElementById('costBBL24').textContent = costBBLs[14].toFixed(2);
    document.getElementById('costBBL28').textContent = costBBLs[15].toFixed(2);
    document.getElementById('costBBL32').textContent = costBBLs[16].toFixed(2);
    document.getElementById('costBBL36').textContent = costBBLs[17].toFixed(2);
    document.getElementById('costBBL40').textContent = costBBLs[18].toFixed(2);
    document.getElementById('costBBL44').textContent = costBBLs[19].toFixed(2);
    document.getElementById('costBBL48').textContent = costBBLs[23].toFixed(2);

    document.getElementById('costBBL49').textContent = costBBLs[24].toFixed(2);
    document.getElementById('costBBL52').textContent = costBBLs[25].toFixed(2);
    document.getElementById('costBBL55').textContent = costBBLs[26].toFixed(2);
    document.getElementById('costBBL58').textContent = costBBLs[27].toFixed(2);
    document.getElementById('costBBL61').textContent = costBBLs[28].toFixed(2);
    document.getElementById('costBBL64').textContent = costBBLs[29].toFixed(2);
    document.getElementById('costBBL67').textContent = costBBLs[30].toFixed(2);
    document.getElementById('costBBL70').textContent = costBBLs[31].toFixed(2);
    document.getElementById('costBBL73').textContent = costBBLs[32].toFixed(2);

    document.getElementById('costBBL50').textContent = costBBLs[24].toFixed(2);
    document.getElementById('costBBL53').textContent = costBBLs[25].toFixed(2);
    document.getElementById('costBBL56').textContent = costBBLs[26].toFixed(2);
    document.getElementById('costBBL59').textContent = costBBLs[27].toFixed(2);
    document.getElementById('costBBL62').textContent = costBBLs[28].toFixed(2);
    document.getElementById('costBBL65').textContent = costBBLs[29].toFixed(2);
    document.getElementById('costBBL68').textContent = costBBLs[30].toFixed(2);
    document.getElementById('costBBL71').textContent = costBBLs[31].toFixed(2);
    document.getElementById('costBBL74').textContent = costBBLs[33].toFixed(2);

    document.getElementById('costBBL51').textContent = costBBLs[24].toFixed(2);
    document.getElementById('costBBL54').textContent = costBBLs[25].toFixed(2);
    document.getElementById('costBBL57').textContent = costBBLs[26].toFixed(2);
    document.getElementById('costBBL60').textContent = costBBLs[27].toFixed(2);
    document.getElementById('costBBL63').textContent = costBBLs[28].toFixed(2);
    document.getElementById('costBBL66').textContent = costBBLs[29].toFixed(2);
    document.getElementById('costBBL69').textContent = costBBLs[30].toFixed(2);
    document.getElementById('costBBL72').textContent = costBBLs[31].toFixed(2);
    document.getElementById('costBBL75').textContent = costBBLs[34].toFixed(2);

    document.getElementById('costBBL76').textContent = costBBLs[35].toFixed(2);
    document.getElementById('costBBL77').textContent = costBBLs[36].toFixed(2);
    document.getElementById('costBBL78').textContent = costBBLs[37].toFixed(2);
    document.getElementById('costBBL79').textContent = costBBLs[38].toFixed(2);
    document.getElementById('costBBL80').textContent = costBBLs[39].toFixed(2);

    document.getElementById('costBBL81').textContent = costBBLs[40].toFixed(2);
    document.getElementById('costBBL86').textContent = costBBLs[41].toFixed(2);
    document.getElementById('costBBL91').textContent = costBBLs[42].toFixed(2);
    document.getElementById('costBBL96').textContent = costBBLs[43].toFixed(2);
    document.getElementById('costBBL101').textContent = costBBLs[44].toFixed(2);
    document.getElementById('costBBL106').textContent = costBBLs[45].toFixed(2);
    document.getElementById('costBBL111').textContent = costBBLs[46].toFixed(2);
    document.getElementById('costBBL116').textContent = costBBLs[47].toFixed(2);
    document.getElementById('costBBL121').textContent = costBBLs[48].toFixed(2);
    document.getElementById('costBBL126').textContent = costBBLs[49].toFixed(2);

    document.getElementById('costBBL82').textContent = costBBLs[40].toFixed(2);
    document.getElementById('costBBL87').textContent = costBBLs[41].toFixed(2);
    document.getElementById('costBBL92').textContent = costBBLs[42].toFixed(2);
    document.getElementById('costBBL97').textContent = costBBLs[43].toFixed(2);
    document.getElementById('costBBL102').textContent = costBBLs[44].toFixed(2);
    document.getElementById('costBBL107').textContent = costBBLs[45].toFixed(2);
    document.getElementById('costBBL112').textContent = costBBLs[46].toFixed(2);
    document.getElementById('costBBL117').textContent = costBBLs[47].toFixed(2);
    document.getElementById('costBBL122').textContent = costBBLs[48].toFixed(2);
    document.getElementById('costBBL127').textContent = costBBLs[50].toFixed(2);

    document.getElementById('costBBL83').textContent = costBBLs[40].toFixed(2);
    document.getElementById('costBBL88').textContent = costBBLs[41].toFixed(2);
    document.getElementById('costBBL93').textContent = costBBLs[42].toFixed(2);
    document.getElementById('costBBL98').textContent = costBBLs[43].toFixed(2);
    document.getElementById('costBBL103').textContent = costBBLs[44].toFixed(2);
    document.getElementById('costBBL108').textContent = costBBLs[45].toFixed(2);
    document.getElementById('costBBL113').textContent = costBBLs[46].toFixed(2);
    document.getElementById('costBBL118').textContent = costBBLs[47].toFixed(2);
    document.getElementById('costBBL123').textContent = costBBLs[48].toFixed(2);
    document.getElementById('costBBL128').textContent = costBBLs[51].toFixed(2);

    document.getElementById('costBBL84').textContent = costBBLs[40].toFixed(2);
    document.getElementById('costBBL89').textContent = costBBLs[41].toFixed(2);
    document.getElementById('costBBL94').textContent = costBBLs[42].toFixed(2);
    document.getElementById('costBBL99').textContent = costBBLs[43].toFixed(2);
    document.getElementById('costBBL104').textContent = costBBLs[44].toFixed(2);
    document.getElementById('costBBL109').textContent = costBBLs[45].toFixed(2);
    document.getElementById('costBBL114').textContent = costBBLs[46].toFixed(2);
    document.getElementById('costBBL119').textContent = costBBLs[47].toFixed(2);
    document.getElementById('costBBL124').textContent = costBBLs[48].toFixed(2);
    document.getElementById('costBBL129').textContent = costBBLs[52].toFixed(2);

    document.getElementById('costBBL85').textContent = costBBLs[40].toFixed(2);
    document.getElementById('costBBL90').textContent = costBBLs[41].toFixed(2);
    document.getElementById('costBBL95').textContent = costBBLs[42].toFixed(2);
    document.getElementById('costBBL100').textContent = costBBLs[43].toFixed(2);
    document.getElementById('costBBL105').textContent = costBBLs[44].toFixed(2);
    document.getElementById('costBBL110').textContent = costBBLs[45].toFixed(2);
    document.getElementById('costBBL115').textContent = costBBLs[46].toFixed(2);
    document.getElementById('costBBL120').textContent = costBBLs[47].toFixed(2);
    document.getElementById('costBBL125').textContent = costBBLs[48].toFixed(2);
    document.getElementById('costBBL130').textContent = costBBLs[53].toFixed(2);
    
    document.getElementById('costBBL131').textContent = costBBLs[54].toFixed(2);
    document.getElementById('costBBL132').textContent = costBBLs[55].toFixed(2);
    document.getElementById('costBBL133').textContent = costBBLs[56].toFixed(2);
    document.getElementById('costBBL134').textContent = costBBLs[57].toFixed(2);
    document.getElementById('costBBL135').textContent = costBBLs[58].toFixed(2);


    // Calculate Section with and without Barite
    var sectionWithoutBariteBBL1 = costBBLs[0] + costBBLs[1] + costBBLs[2] + costBBLs[3];
    var sectionWithBariteBBL1 = sectionWithoutBariteBBL1 + costBBLs[4];

    var sectionWithoutBariteBBL2 = costBBLs[5] + costBBLs[6] + costBBLs[7] + costBBLs[8] + costBBLs[9] + costBBLs[10];
    var sectionWithBariteBBL2 = sectionWithoutBariteBBL2 + costBBLs[11];

    var sectionWithoutBariteBBL3 = costBBLs[12] + costBBLs[13] + costBBLs[14] + costBBLs[15] + costBBLs[16] + costBBLs[17] + costBBLs[18] + costBBLs[19];
    var sectionWithBariteBBL3 = sectionWithoutBariteBBL3 + costBBLs[20];

    var sectionWithBariteBBL4 = sectionWithoutBariteBBL3 + costBBLs[21];
    var sectionWithBariteBBL5 = sectionWithoutBariteBBL3 + costBBLs[22];
    var sectionWithBariteBBL6 = sectionWithoutBariteBBL3 + costBBLs[23];

    var sectionWithoutBariteBBL7 = costBBLs[24] + costBBLs[25] + costBBLs[26] + costBBLs[27] + costBBLs[28] + costBBLs[29] + costBBLs[30] + costBBLs[31] + costBBLs[32];
    var sectionWithoutBariteBBL8 = costBBLs[24] + costBBLs[25] + costBBLs[26] + costBBLs[27] + costBBLs[28] + costBBLs[29] + costBBLs[30] + costBBLs[31] + costBBLs[33];
    var sectionWithoutBariteBBL9 = costBBLs[24] + costBBLs[25] + costBBLs[26] + costBBLs[27] + costBBLs[28] + costBBLs[29] + costBBLs[30] + costBBLs[31] + costBBLs[34];

    var sectionWithoutBariteBBL11 = costBBLs[40] + costBBLs[41] + costBBLs[42] + costBBLs[43] + costBBLs[44] + costBBLs[45] + costBBLs[46] + costBBLs[47] + costBBLs[48];
    var sectionWithoutBariteBBL12 = sectionWithoutBariteBBL11;
    var sectionWithoutBariteBBL13 = sectionWithoutBariteBBL11;
    var sectionWithoutBariteBBL14 = sectionWithoutBariteBBL11;
    var sectionWithoutBariteBBL15 = sectionWithoutBariteBBL11;

    var sectionWithBariteBBL11 = sectionWithoutBariteBBL11 + costBBLs[49];
    var sectionWithBariteBBL12 = sectionWithoutBariteBBL11 + costBBLs[50];
    var sectionWithBariteBBL13 = sectionWithoutBariteBBL11 + costBBLs[51];
    var sectionWithBariteBBL14 = sectionWithoutBariteBBL11 + costBBLs[52];
    var sectionWithBariteBBL15 = sectionWithoutBariteBBL11 + costBBLs[53];
    
    var costPerBarrelValue10 = costBBLs[35];
    var costPerBarrelValue11 = costBBLs[36];
    var costPerBarrelValue12 = costBBLs[37];
    var costPerBarrelValue13 = costBBLs[38];
    var costPerBarrelValue14 = costBBLs[39];
    
    var costPerBarrelValue15 = costBBLs[54];
    var costPerBarrelValue16 = costBBLs[55];
    var costPerBarrelValue17 = costBBLs[56];
    var costPerBarrelValue18 = costBBLs[57];
    var costPerBarrelValue19 = costBBLs[58];
    
    var holeSizeValue1 = sessionStorage.getItem('holeSizeValue1') || 0;
    var holeSizeValue2 = sessionStorage.getItem('holeSizeValue2') || 0;
    var holeSizeValue3 = sessionStorage.getItem('holeSizeValue3') || 0;
    var holeSizeValue4 = sessionStorage.getItem('holeSizeValue4') || 0;
    var holeSizeValue5 = sessionStorage.getItem('holeSizeValue5') || 0;
    var holeSizeValue6 = sessionStorage.getItem('holeSizeValue6') || 0;
    var holeSizeValue7 = sessionStorage.getItem('holeSizeValue7') || 0;
    var holeSizeValue8 = sessionStorage.getItem('holeSizeValue8') || 0;
    var holeSizeValue9 = sessionStorage.getItem('holeSizeValue9') || 0;
    
    var holeSizeValue10 = sessionStorage.getItem('holeSizeValue10') || 0;
    var holeSizeValue11 = sessionStorage.getItem('holeSizeValue11') || 0;
    var holeSizeValue12 = sessionStorage.getItem('holeSizeValue12') || 0;
    var holeSizeValue13 = sessionStorage.getItem('holeSizeValue13') || 0;
    var holeSizeValue14 = sessionStorage.getItem('holeSizeValue14') || 0;
    var holeSizeValue15 = sessionStorage.getItem('holeSizeValue15') || 0;
    var holeSizeValue16 = sessionStorage.getItem('holeSizeValue16') || 0;
    var holeSizeValue17 = sessionStorage.getItem('holeSizeValue17') || 0;
    var holeSizeValue18 = sessionStorage.getItem('holeSizeValue18') || 0;
    
    
    var factor1 = parseFloat(document.getElementById('factor1').value) || 0;
    var factor2 = parseFloat(document.getElementById('factor2').value) || 0;
    var factor3 = parseFloat(document.getElementById('factor3').value) || 0;
    var factor4 = parseFloat(document.getElementById('factor4').value) || 0;
    var factor5 = parseFloat(document.getElementById('factor5').value) || 0;
    var factor6 = parseFloat(document.getElementById('factor6').value) || 0;
    var factor7 = parseFloat(document.getElementById('factor7').value) || 0;
    
    var CasingVolumeValue6 = parseFloat(sessionStorage.getItem('CasingVolumeValue6'));
    var CasingVolumeValue7 = parseFloat(sessionStorage.getItem('CasingVolumeValue7'));
    var CasingVolumeValue8 = parseFloat(sessionStorage.getItem('CasingVolumeValue8'));
    var CasingVolumeValue9 = parseFloat(sessionStorage.getItem('CasingVolumeValue9'));
    var CasingVolumeValue10 = parseFloat(sessionStorage.getItem('CasingVolumeValue10'));
    
    var SectionFootageValue6 = parseFloat(sessionStorage.getItem('SectionFootageValue6'));
    var SectionFootageValue7 = parseFloat(sessionStorage.getItem('SectionFootageValue7'));
    var SectionFootageValue8 = parseFloat(sessionStorage.getItem('SectionFootageValue8'));
    var SectionFootageValue9 = parseFloat(sessionStorage.getItem('SectionFootageValue9'));
    var SectionFootageValue10 = parseFloat(sessionStorage.getItem('SectionFootageValue10'));
    
    var costFT1 = (((holeSizeValue1 ** 2) / 1029) * costBBLs[0] ) * factor1;
    var costFT2 = (((holeSizeValue1 ** 2) / 1029) * costBBLs[1] ) * factor1;
    var costFT3 = (((holeSizeValue1 ** 2) / 1029) * costBBLs[2] ) * factor1;
    var costFT4 = (((holeSizeValue1 ** 2) / 1029) * costBBLs[3] ) * factor1;
    var costFT5 = (((holeSizeValue1 ** 2) / 1029) * costBBLs[4] ) * factor1;
    
    var costFT6 = (((holeSizeValue2 ** 2) / 1029) * costBBLs[5] ) * factor2;
    var costFT7 = (((holeSizeValue2 ** 2) / 1029) * costBBLs[6] ) * factor2;
    var costFT8 = (((holeSizeValue2 ** 2) / 1029) * costBBLs[7] ) * factor2;
    var costFT9 = (((holeSizeValue2 ** 2) / 1029) * costBBLs[8] ) * factor2;
    var costFT10 = (((holeSizeValue2 ** 2) / 1029) * costBBLs[9] ) * factor2;
    var costFT11 = (((holeSizeValue2 ** 2) / 1029) * costBBLs[10] ) * factor2;
    var costFT12 = (((holeSizeValue2 ** 2) / 1029) * costBBLs[11] ) * factor2;
    
    var costFT13 = (((holeSizeValue3 ** 2) / 1029) * costBBLs[12] ) * factor3;
    var costFT14 = (((holeSizeValue4 ** 2) / 1029) * costBBLs[12] ) * factor3;
    var costFT15 = (((holeSizeValue5 ** 2) / 1029) * costBBLs[12] ) * factor3;
    var costFT16 = (((holeSizeValue6 ** 2) / 1029) * costBBLs[12] ) * factor3;
    
    var costFT17 = (((holeSizeValue3 ** 2) / 1029) * costBBLs[13] ) * factor3;
    var costFT18 = (((holeSizeValue4 ** 2) / 1029) * costBBLs[13] ) * factor3;
    var costFT19 = (((holeSizeValue5 ** 2) / 1029) * costBBLs[13] ) * factor3;
    var costFT20 = (((holeSizeValue6 ** 2) / 1029) * costBBLs[13] ) * factor3;
    
    var costFT21 = (((holeSizeValue3 ** 2) / 1029) * costBBLs[14] ) * factor3;
    var costFT22 = (((holeSizeValue4 ** 2) / 1029) * costBBLs[14] ) * factor3;
    var costFT23 = (((holeSizeValue5 ** 2) / 1029) * costBBLs[14] ) * factor3;
    var costFT24 = (((holeSizeValue6 ** 2) / 1029) * costBBLs[14] ) * factor3;
    
    var costFT25 = (((holeSizeValue3 ** 2) / 1029) * costBBLs[15] ) * factor3;
    var costFT26 = (((holeSizeValue4 ** 2) / 1029) * costBBLs[15] ) * factor3;
    var costFT27 = (((holeSizeValue5 ** 2) / 1029) * costBBLs[15] ) * factor3;
    var costFT28 = (((holeSizeValue6 ** 2) / 1029) * costBBLs[15] ) * factor3;
    
    var costFT29 = (((holeSizeValue3 ** 2) / 1029) * costBBLs[16] ) * factor3;
    var costFT30 = (((holeSizeValue4 ** 2) / 1029) * costBBLs[16] ) * factor3;
    var costFT31 = (((holeSizeValue5 ** 2) / 1029) * costBBLs[16] ) * factor3;
    var costFT32 = (((holeSizeValue6 ** 2) / 1029) * costBBLs[16] ) * factor3;
    
    var costFT33 = (((holeSizeValue3 ** 2) / 1029) * costBBLs[17] ) * factor3;
    var costFT34 = (((holeSizeValue4 ** 2) / 1029) * costBBLs[17] ) * factor3;
    var costFT35 = (((holeSizeValue5 ** 2) / 1029) * costBBLs[17] ) * factor3;
    var costFT36 = (((holeSizeValue6 ** 2) / 1029) * costBBLs[17] ) * factor3;
    
    var costFT37 = (((holeSizeValue3 ** 2) / 1029) * costBBLs[18] ) * factor3;
    var costFT38 = (((holeSizeValue4 ** 2) / 1029) * costBBLs[18] ) * factor3;
    var costFT39 = (((holeSizeValue5 ** 2) / 1029) * costBBLs[18] ) * factor3;
    var costFT40 = (((holeSizeValue6 ** 2) / 1029) * costBBLs[18] ) * factor3;
    
    var costFT41 = (((holeSizeValue3 ** 2) / 1029) * costBBLs[19] ) * factor3;
    var costFT42 = (((holeSizeValue4 ** 2) / 1029) * costBBLs[19] ) * factor3;
    var costFT43 = (((holeSizeValue5 ** 2) / 1029) * costBBLs[19] ) * factor3;
    var costFT44 = (((holeSizeValue6 ** 2) / 1029) * costBBLs[19] ) * factor3;
    
    var costFT45 = (((holeSizeValue3 ** 2) / 1029) * costBBLs[20] ) * factor3;
    var costFT46 = (((holeSizeValue4 ** 2) / 1029) * costBBLs[21] ) * factor3;
    var costFT47 = (((holeSizeValue5 ** 2) / 1029) * costBBLs[22] ) * factor3;
    var costFT48 = (((holeSizeValue6 ** 2) / 1029) * costBBLs[23] ) * factor3;
    
    var costFT49 = (((holeSizeValue7 ** 2) / 1029) * costBBLs[24] ) * factor4;
    var costFT50 = (((holeSizeValue8 ** 2) / 1029) * costBBLs[24] ) * factor4;
    var costFT51 = (((holeSizeValue9 ** 2) / 1029) * costBBLs[24] ) * factor4;
    
    var costFT52 = (((holeSizeValue7 ** 2) / 1029) * costBBLs[25] ) * factor4;
    var costFT53 = (((holeSizeValue8 ** 2) / 1029) * costBBLs[25] ) * factor4;
    var costFT54 = (((holeSizeValue9 ** 2) / 1029) * costBBLs[25] ) * factor4;
    
    var costFT55 = (((holeSizeValue7 ** 2) / 1029) * costBBLs[26] ) * factor4;
    var costFT56 = (((holeSizeValue8 ** 2) / 1029) * costBBLs[26] ) * factor4;
    var costFT57 = (((holeSizeValue9 ** 2) / 1029) * costBBLs[26] ) * factor4;
    
    var costFT58 = (((holeSizeValue7 ** 2) / 1029) * costBBLs[27] ) * factor4;
    var costFT59 = (((holeSizeValue8 ** 2) / 1029) * costBBLs[27] ) * factor4;
    var costFT60 = (((holeSizeValue9 ** 2) / 1029) * costBBLs[27] ) * factor4;
    
    var costFT61 = (((holeSizeValue7 ** 2) / 1029) * costBBLs[28] ) * factor4;
    var costFT62 = (((holeSizeValue8 ** 2) / 1029) * costBBLs[28] ) * factor4;
    var costFT63 = (((holeSizeValue9 ** 2) / 1029) * costBBLs[28] ) * factor4;
    
    var costFT64 = (((holeSizeValue7 ** 2) / 1029) * costBBLs[29] ) * factor4;
    var costFT65 = (((holeSizeValue8 ** 2) / 1029) * costBBLs[29] ) * factor4;
    var costFT66 = (((holeSizeValue9 ** 2) / 1029) * costBBLs[29] ) * factor4;
    
    var costFT67 = (((holeSizeValue7 ** 2) / 1029) * costBBLs[30] ) * factor4;
    var costFT68 = (((holeSizeValue8 ** 2) / 1029) * costBBLs[30] ) * factor4;
    var costFT69 = (((holeSizeValue9 ** 2) / 1029) * costBBLs[30] ) * factor4;
    
    var costFT70 = (((holeSizeValue7 ** 2) / 1029) * costBBLs[31] ) * factor4;
    var costFT71 = (((holeSizeValue8 ** 2) / 1029) * costBBLs[31] ) * factor4;
    var costFT72 = (((holeSizeValue9 ** 2) / 1029) * costBBLs[31] ) * factor4;
    
    var costFT73 = (((holeSizeValue7 ** 2) / 1029) * costBBLs[32] ) * factor4;
    var costFT74 = (((holeSizeValue8 ** 2) / 1029) * costBBLs[33] ) * factor4;
    var costFT75 = (((holeSizeValue9 ** 2) / 1029) * costBBLs[34] ) * factor4;
    
    var costFT76 = costBBLs[35] * (CasingVolumeValue6 / SectionFootageValue6);
    var costFT77 = costBBLs[36] * (CasingVolumeValue7 / SectionFootageValue7);
    var costFT78 = costBBLs[37] * (CasingVolumeValue8 / SectionFootageValue8);
    var costFT79 = costBBLs[38] * (CasingVolumeValue9 / SectionFootageValue9);
    var costFT80 = costBBLs[39] * (CasingVolumeValue10 / SectionFootageValue10);
    
    var costFT81 = (((holeSizeValue10 ** 2) / 1029) * costBBLs[40] ) * factor6;
    var costFT82 = (((holeSizeValue11 ** 2) / 1029) * costBBLs[40] ) * factor6;
    var costFT83 = (((holeSizeValue12 ** 2) / 1029) * costBBLs[40] ) * factor6;
    var costFT84 = (((holeSizeValue13 ** 2) / 1029) * costBBLs[40] ) * factor6;
    var costFT85 = (((holeSizeValue14 ** 2) / 1029) * costBBLs[40] ) * factor6;
    
    var costFT86 = (((holeSizeValue10 ** 2) / 1029) * costBBLs[41] ) * factor6;
    var costFT87 = (((holeSizeValue11 ** 2) / 1029) * costBBLs[41] ) * factor6;
    var costFT88 = (((holeSizeValue12 ** 2) / 1029) * costBBLs[41] ) * factor6;
    var costFT89 = (((holeSizeValue13 ** 2) / 1029) * costBBLs[41] ) * factor6;
    var costFT90 = (((holeSizeValue14 ** 2) / 1029) * costBBLs[41] ) * factor6;
    
    var costFT91 = (((holeSizeValue10 ** 2) / 1029) * costBBLs[42] ) * factor6;
    var costFT92 = (((holeSizeValue11 ** 2) / 1029) * costBBLs[42] ) * factor6;
    var costFT93 = (((holeSizeValue12 ** 2) / 1029) * costBBLs[42] ) * factor6;
    var costFT94 = (((holeSizeValue13 ** 2) / 1029) * costBBLs[42] ) * factor6;
    var costFT95 = (((holeSizeValue14 ** 2) / 1029) * costBBLs[42] ) * factor6;
    
    var costFT96 = (((holeSizeValue10 ** 2) / 1029) * costBBLs[43] ) * factor6;
    var costFT97 = (((holeSizeValue11 ** 2) / 1029) * costBBLs[43] ) * factor6;
    var costFT98 = (((holeSizeValue12 ** 2) / 1029) * costBBLs[43] ) * factor6;
    var costFT99 = (((holeSizeValue13 ** 2) / 1029) * costBBLs[43] ) * factor6;
    var costFT100 = (((holeSizeValue14 ** 2) / 1029) * costBBLs[43] ) * factor6;
    
    var costFT101 = (((holeSizeValue10 ** 2) / 1029) * costBBLs[44] ) * factor6;
    var costFT102 = (((holeSizeValue11 ** 2) / 1029) * costBBLs[44] ) * factor6;
    var costFT103 = (((holeSizeValue12 ** 2) / 1029) * costBBLs[44] ) * factor6;
    var costFT104 = (((holeSizeValue13 ** 2) / 1029) * costBBLs[44] ) * factor6;
    var costFT105 = (((holeSizeValue14 ** 2) / 1029) * costBBLs[44] ) * factor6;
    
    var costFT106 = (((holeSizeValue10 ** 2) / 1029) * costBBLs[45] ) * factor6;
    var costFT107 = (((holeSizeValue11 ** 2) / 1029) * costBBLs[45] ) * factor6;
    var costFT108 = (((holeSizeValue12 ** 2) / 1029) * costBBLs[45] ) * factor6;
    var costFT109 = (((holeSizeValue13 ** 2) / 1029) * costBBLs[45] ) * factor6;
    var costFT110 = (((holeSizeValue14 ** 2) / 1029) * costBBLs[45] ) * factor6;

    var costFT111 = (((holeSizeValue10 ** 2) / 1029) * costBBLs[46] ) * factor6;
    var costFT112 = (((holeSizeValue11 ** 2) / 1029) * costBBLs[46] ) * factor6;
    var costFT113 = (((holeSizeValue12 ** 2) / 1029) * costBBLs[46] ) * factor6;
    var costFT114 = (((holeSizeValue13 ** 2) / 1029) * costBBLs[46] ) * factor6;
    var costFT115 = (((holeSizeValue14 ** 2) / 1029) * costBBLs[46] ) * factor6;  
    
    var costFT116 = (((holeSizeValue10 ** 2) / 1029) * costBBLs[47] ) * factor6;
    var costFT117 = (((holeSizeValue11 ** 2) / 1029) * costBBLs[47] ) * factor6;
    var costFT118 = (((holeSizeValue12 ** 2) / 1029) * costBBLs[47] ) * factor6;
    var costFT119 = (((holeSizeValue13 ** 2) / 1029) * costBBLs[47] ) * factor6;
    var costFT120 = (((holeSizeValue14 ** 2) / 1029) * costBBLs[47] ) * factor6; 
    
    var costFT121 = (((holeSizeValue10 ** 2) / 1029) * costBBLs[48] ) * factor6; 
    var costFT122 = (((holeSizeValue11 ** 2) / 1029) * costBBLs[48] ) * factor6; 
    var costFT123 = (((holeSizeValue12 ** 2) / 1029) * costBBLs[48] ) * factor6; 
    var costFT124 = (((holeSizeValue13 ** 2) / 1029) * costBBLs[48] ) * factor6; 
    var costFT125 = (((holeSizeValue14 ** 2) / 1029) * costBBLs[48] ) * factor6; 
    
    var costFT126 = (((holeSizeValue10 ** 2) / 1029) * costBBLs[49] ) * factor6; 
    var costFT127 = (((holeSizeValue11 ** 2) / 1029) * costBBLs[50] ) * factor6; 
    var costFT128 = (((holeSizeValue12 ** 2) / 1029) * costBBLs[51] ) * factor6; 
    var costFT129 = (((holeSizeValue13 ** 2) / 1029) * costBBLs[52] ) * factor6; 
    var costFT130 = (((holeSizeValue14 ** 2) / 1029) * costBBLs[53] ) * factor6; 
    
    var costFT131 = costBBLs[54] * (CasingVolumeValue6 / SectionFootageValue6);
    var costFT132 = costBBLs[55] * (CasingVolumeValue7 / SectionFootageValue7);
    var costFT133 = costBBLs[56] * (CasingVolumeValue8 / SectionFootageValue8);
    var costFT134 = costBBLs[57] * (CasingVolumeValue9 / SectionFootageValue9);
    var costFT135 = costBBLs[58] * (CasingVolumeValue10 / SectionFootageValue10);
    
    var sectionWithoutBariteFT1 = costFT1 + costFT2 + costFT3 + costFT4;
    var sectionWithBariteFT1 = sectionWithoutBariteFT1 + costFT5;
    
    var sectionWithoutBariteFT2 = costFT6 + costFT7 + costFT8 + costFT9 + costFT10 + costFT11;  
    var sectionWithBariteFT2 = sectionWithoutBariteFT2 + costFT12;
    
    var sectionWithoutBariteFT3 = costFT13 + costFT17 + costFT21 + costFT25 + costFT29 + costFT33 + costFT37 + costFT41;
    var sectionWithBariteFT3 = sectionWithoutBariteFT3 + costFT45;
    
    var sectionWithoutBariteFT4 = costFT14 + costFT18 + costFT22 + costFT26 + costFT30 + costFT34 + costFT38 + costFT42;
    var sectionWithBariteFT4 = sectionWithoutBariteFT4 + costFT46;
    
    var sectionWithoutBariteFT5 = costFT15 + costFT19 + costFT23 + costFT27 + costFT31 + costFT35 + costFT39 + costFT43;
    var sectionWithBariteFT5 = sectionWithoutBariteFT5 + costFT47;
    
    var sectionWithoutBariteFT6 = costFT16 + costFT20 + costFT24 + costFT28 + costFT32 + costFT36 + costFT40 + costFT44;
    var sectionWithBariteFT6 = sectionWithoutBariteFT6 + costFT48;
    
    var sectionWithoutBariteFT7 = costFT49 + costFT52 + costFT55 + costFT58 + costFT61 + costFT64 + costFT67 + costFT70 + costFT73;
    var sectionWithoutBariteFT8 = costFT50 + costFT53 + costFT56 + costFT59 + costFT62 + costFT65 + costFT68 + costFT71 + costFT74;
    var sectionWithoutBariteFT9 = costFT51 + costFT54 + costFT57 + costFT60 + costFT63 + costFT66 + costFT69 + costFT72 + costFT75;
           
    var sectionWithoutBariteFT11 = costFT81 + costFT86 + costFT91 + costFT96 + costFT101 + costFT106 + costFT111 + costFT116 + costFT121;
    var sectionWithBariteFT11 = sectionWithoutBariteFT11 + costFT126;
    
    var sectionWithoutBariteFT12 = costFT82 + costFT87 + costFT92 + costFT97 + costFT102 + costFT107 + costFT112 + costFT117 + costFT122;
    var sectionWithBariteFT12 = sectionWithoutBariteFT12 + costFT127; 
    
    var sectionWithoutBariteFT13 = costFT83 + costFT88 + costFT93 + costFT98 + costFT103 + costFT108 + costFT113 + costFT118 + costFT123;
    var sectionWithBariteFT13 = sectionWithoutBariteFT13 + costFT128;  
    
    var sectionWithoutBariteFT14 = costFT84 + costFT89 + costFT94 + costFT99 + costFT104 + costFT109 + costFT114 + costFT119 + costFT124;
    var sectionWithBariteFT14 = sectionWithoutBariteFT14 + costFT129; 
    
    var sectionWithoutBariteFT15 = costFT85 + costFT90 + costFT95 + costFT100 + costFT105 + costFT110 + costFT115 + costFT120 + costFT125;
    var sectionWithBariteFT15 = sectionWithoutBariteFT15 + costFT130;
    
    
    document.getElementById('costFT1').textContent = costFT1.toFixed(2);
    document.getElementById('costFT2').textContent = costFT2.toFixed(2);
    document.getElementById('costFT3').textContent = costFT3.toFixed(2);
    document.getElementById('costFT4').textContent = costFT4.toFixed(2);
    document.getElementById('costFT5').textContent = costFT5.toFixed(2);
    
    document.getElementById('costFT6').textContent = costFT6.toFixed(2);
    document.getElementById('costFT7').textContent = costFT7.toFixed(2);
    document.getElementById('costFT8').textContent = costFT8.toFixed(2);
    document.getElementById('costFT9').textContent = costFT9.toFixed(2);
    document.getElementById('costFT10').textContent = costFT10.toFixed(2);
    document.getElementById('costFT11').textContent = costFT11.toFixed(2);
    document.getElementById('costFT12').textContent = costFT12.toFixed(2);
    
    document.getElementById('costFT13').textContent = costFT13.toFixed(2);
    document.getElementById('costFT14').textContent = costFT14.toFixed(2);
    document.getElementById('costFT15').textContent = costFT15.toFixed(2);
    document.getElementById('costFT16').textContent = costFT16.toFixed(2);
    
    document.getElementById('costFT17').textContent = costFT17.toFixed(2);
    document.getElementById('costFT18').textContent = costFT18.toFixed(2);
    document.getElementById('costFT19').textContent = costFT19.toFixed(2);
    document.getElementById('costFT20').textContent = costFT20.toFixed(2);
    
    document.getElementById('costFT21').textContent = costFT21.toFixed(2);
    document.getElementById('costFT22').textContent = costFT22.toFixed(2);
    document.getElementById('costFT23').textContent = costFT23.toFixed(2);
    document.getElementById('costFT24').textContent = costFT24.toFixed(2);
    
    document.getElementById('costFT25').textContent = costFT25.toFixed(2);
    document.getElementById('costFT26').textContent = costFT26.toFixed(2);
    document.getElementById('costFT27').textContent = costFT27.toFixed(2);
    document.getElementById('costFT28').textContent = costFT28.toFixed(2);
    
    document.getElementById('costFT29').textContent = costFT29.toFixed(2);
    document.getElementById('costFT30').textContent = costFT30.toFixed(2);
    document.getElementById('costFT31').textContent = costFT31.toFixed(2);
    document.getElementById('costFT32').textContent = costFT32.toFixed(2);
    
    document.getElementById('costFT33').textContent = costFT33.toFixed(2);
    document.getElementById('costFT34').textContent = costFT34.toFixed(2);
    document.getElementById('costFT35').textContent = costFT35.toFixed(2);
    document.getElementById('costFT36').textContent = costFT36.toFixed(2);
    
    document.getElementById('costFT37').textContent = costFT37.toFixed(2);
    document.getElementById('costFT38').textContent = costFT38.toFixed(2);
    document.getElementById('costFT39').textContent = costFT39.toFixed(2);
    document.getElementById('costFT40').textContent = costFT40.toFixed(2);

    document.getElementById('costFT41').textContent = costFT41.toFixed(2);
    document.getElementById('costFT42').textContent = costFT42.toFixed(2);
    document.getElementById('costFT43').textContent = costFT43.toFixed(2);
    document.getElementById('costFT44').textContent = costFT44.toFixed(2);
    
    document.getElementById('costFT45').textContent = costFT45.toFixed(2);
    document.getElementById('costFT46').textContent = costFT46.toFixed(2);
    document.getElementById('costFT47').textContent = costFT47.toFixed(2);
    document.getElementById('costFT48').textContent = costFT48.toFixed(2);
    
    document.getElementById('costFT49').textContent = costFT49.toFixed(2);
    document.getElementById('costFT50').textContent = costFT50.toFixed(2);
    document.getElementById('costFT51').textContent = costFT51.toFixed(2);
    
    document.getElementById('costFT52').textContent = costFT52.toFixed(2);
    document.getElementById('costFT53').textContent = costFT53.toFixed(2);
    document.getElementById('costFT54').textContent = costFT54.toFixed(2);
    
    document.getElementById('costFT55').textContent = costFT55.toFixed(2);
    document.getElementById('costFT56').textContent = costFT56.toFixed(2);
    document.getElementById('costFT57').textContent = costFT57.toFixed(2);
   
    document.getElementById('costFT58').textContent = costFT58.toFixed(2);
    document.getElementById('costFT59').textContent = costFT59.toFixed(2);
    document.getElementById('costFT60').textContent = costFT60.toFixed(2);
   
    document.getElementById('costFT61').textContent = costFT61.toFixed(2);
    document.getElementById('costFT62').textContent = costFT62.toFixed(2);
    document.getElementById('costFT63').textContent = costFT63.toFixed(2);
    
    document.getElementById('costFT64').textContent = costFT64.toFixed(2);
    document.getElementById('costFT65').textContent = costFT65.toFixed(2);
    document.getElementById('costFT66').textContent = costFT66.toFixed(2);
    
    document.getElementById('costFT67').textContent = costFT67.toFixed(2);
    document.getElementById('costFT68').textContent = costFT68.toFixed(2);
    document.getElementById('costFT69').textContent = costFT69.toFixed(2);
    
    document.getElementById('costFT70').textContent = costFT70.toFixed(2);
    document.getElementById('costFT71').textContent = costFT71.toFixed(2);
    document.getElementById('costFT72').textContent = costFT72.toFixed(2);
   
    document.getElementById('costFT73').textContent = costFT73.toFixed(2);
    document.getElementById('costFT74').textContent = costFT74.toFixed(2);
    document.getElementById('costFT75').textContent = costFT75.toFixed(2);
    
    document.getElementById('costFT76').textContent = costFT76.toFixed(2);
    document.getElementById('costFT77').textContent = costFT77.toFixed(2);
    document.getElementById('costFT78').textContent = costFT78.toFixed(2);
    document.getElementById('costFT79').textContent = costFT79.toFixed(2);
    document.getElementById('costFT80').textContent = costFT80.toFixed(2);
    
    document.getElementById('costFT81').textContent = costFT81.toFixed(2);
    document.getElementById('costFT82').textContent = costFT82.toFixed(2);
    document.getElementById('costFT83').textContent = costFT83.toFixed(2);
    document.getElementById('costFT84').textContent = costFT84.toFixed(2);
    document.getElementById('costFT85').textContent = costFT85.toFixed(2);
    
    document.getElementById('costFT86').textContent = costFT86.toFixed(2);
    document.getElementById('costFT87').textContent = costFT87.toFixed(2);
    document.getElementById('costFT88').textContent = costFT88.toFixed(2);
    document.getElementById('costFT89').textContent = costFT89.toFixed(2);
    document.getElementById('costFT90').textContent = costFT90.toFixed(2);
    
    document.getElementById('costFT91').textContent = costFT91.toFixed(2);
    document.getElementById('costFT92').textContent = costFT92.toFixed(2);
    document.getElementById('costFT93').textContent = costFT93.toFixed(2);
    document.getElementById('costFT94').textContent = costFT94.toFixed(2);
    document.getElementById('costFT95').textContent = costFT95.toFixed(2);
    
    document.getElementById('costFT96').textContent = costFT96.toFixed(2);
    document.getElementById('costFT97').textContent = costFT97.toFixed(2);
    document.getElementById('costFT98').textContent = costFT98.toFixed(2);
    document.getElementById('costFT99').textContent = costFT99.toFixed(2);
    document.getElementById('costFT100').textContent = costFT100.toFixed(2);
    
    document.getElementById('costFT101').textContent = costFT101.toFixed(2);
    document.getElementById('costFT102').textContent = costFT102.toFixed(2);
    document.getElementById('costFT103').textContent = costFT103.toFixed(2);
    document.getElementById('costFT104').textContent = costFT104.toFixed(2);
    document.getElementById('costFT105').textContent = costFT105.toFixed(2);
    
    document.getElementById('costFT106').textContent = costFT106.toFixed(2);
    document.getElementById('costFT107').textContent = costFT107.toFixed(2);
    document.getElementById('costFT108').textContent = costFT108.toFixed(2);
    document.getElementById('costFT109').textContent = costFT109.toFixed(2);
    document.getElementById('costFT110').textContent = costFT110.toFixed(2);
    
    document.getElementById('costFT111').textContent = costFT111.toFixed(2);
    document.getElementById('costFT112').textContent = costFT112.toFixed(2);
    document.getElementById('costFT113').textContent = costFT113.toFixed(2);
    document.getElementById('costFT114').textContent = costFT114.toFixed(2);
    document.getElementById('costFT115').textContent = costFT115.toFixed(2);
    
    document.getElementById('costFT116').textContent = costFT116.toFixed(2);
    document.getElementById('costFT117').textContent = costFT117.toFixed(2);
    document.getElementById('costFT118').textContent = costFT118.toFixed(2);
    document.getElementById('costFT119').textContent = costFT119.toFixed(2);
    document.getElementById('costFT120').textContent = costFT120.toFixed(2);
    
    document.getElementById('costFT121').textContent = costFT121.toFixed(2);
    document.getElementById('costFT122').textContent = costFT122.toFixed(2);
    document.getElementById('costFT123').textContent = costFT123.toFixed(2);
    document.getElementById('costFT124').textContent = costFT124.toFixed(2);
    document.getElementById('costFT125').textContent = costFT125.toFixed(2);
    
    document.getElementById('costFT126').textContent = costFT126.toFixed(2);
    document.getElementById('costFT127').textContent = costFT126.toFixed(2);
    document.getElementById('costFT128').textContent = costFT126.toFixed(2);
    document.getElementById('costFT129').textContent = costFT126.toFixed(2);
    document.getElementById('costFT130').textContent = costFT126.toFixed(2);
    
    document.getElementById('costFT131').textContent = costFT131.toFixed(2);
    document.getElementById('costFT132').textContent = costFT132.toFixed(2);
    document.getElementById('costFT133').textContent = costFT133.toFixed(2);
    document.getElementById('costFT134').textContent = costFT134.toFixed(2);
    document.getElementById('costFT135').textContent = costFT135.toFixed(2);
    
    
    
    document.getElementById('sectionWithoutBariteFT1').textContent = sectionWithoutBariteFT1.toFixed(2);
    document.getElementById('sectionWithBariteFT1').textContent = sectionWithBariteFT1.toFixed(2);
    
    document.getElementById('sectionWithoutBariteFT2').textContent = sectionWithoutBariteFT2.toFixed(2);
    document.getElementById('sectionWithBariteFT2').textContent = sectionWithBariteFT2.toFixed(2);
    
    document.getElementById('sectionWithoutBariteFT3').textContent = sectionWithoutBariteFT3.toFixed(2);
    document.getElementById('sectionWithBariteFT3').textContent = sectionWithBariteFT3.toFixed(2);
    
    document.getElementById('sectionWithoutBariteFT4').textContent = sectionWithoutBariteFT4.toFixed(2);
    document.getElementById('sectionWithBariteFT4').textContent = sectionWithBariteFT4.toFixed(2);
    
    document.getElementById('sectionWithoutBariteFT5').textContent = sectionWithoutBariteFT5.toFixed(2);
    document.getElementById('sectionWithBariteFT5').textContent = sectionWithBariteFT5.toFixed(2);
    
    document.getElementById('sectionWithoutBariteFT6').textContent = sectionWithoutBariteFT6.toFixed(2);
    document.getElementById('sectionWithBariteFT6').textContent = sectionWithBariteFT6.toFixed(2);
    
    document.getElementById('sectionWithoutBariteFT7').textContent = sectionWithoutBariteFT7.toFixed(2);
    document.getElementById('sectionWithoutBariteFT8').textContent = sectionWithoutBariteFT8.toFixed(2);
    document.getElementById('sectionWithoutBariteFT9').textContent = sectionWithoutBariteFT9.toFixed(2);
    
    document.getElementById('sectionWithoutBariteFT11').textContent = sectionWithoutBariteFT11.toFixed(2);
    document.getElementById('sectionWithoutBariteFT12').textContent = sectionWithoutBariteFT12.toFixed(2);
    document.getElementById('sectionWithoutBariteFT13').textContent = sectionWithoutBariteFT13.toFixed(2);
    document.getElementById('sectionWithoutBariteFT14').textContent = sectionWithoutBariteFT14.toFixed(2);
    document.getElementById('sectionWithoutBariteFT15').textContent = sectionWithoutBariteFT15.toFixed(2);
    
    document.getElementById('sectionWithBariteFT11').textContent = sectionWithBariteFT11.toFixed(2);
    document.getElementById('sectionWithBariteFT12').textContent = sectionWithBariteFT12.toFixed(2);
    document.getElementById('sectionWithBariteFT13').textContent = sectionWithBariteFT13.toFixed(2);
    document.getElementById('sectionWithBariteFT14').textContent = sectionWithBariteFT14.toFixed(2);
    document.getElementById('sectionWithBariteFT15').textContent = sectionWithBariteFT15.toFixed(2);
    
    
    // Display the result
    document.getElementById('sectionWithoutBariteBBL1').textContent = sectionWithoutBariteBBL1.toFixed(2);
    document.getElementById('sectionWithBariteBBL1').textContent = sectionWithBariteBBL1.toFixed(2);

    document.getElementById('sectionWithoutBariteBBL2').textContent = sectionWithoutBariteBBL2.toFixed(2);
    document.getElementById('sectionWithBariteBBL2').textContent = sectionWithBariteBBL2.toFixed(2);

    document.getElementById('sectionWithoutBariteBBL3').textContent = sectionWithoutBariteBBL3.toFixed(2);
    document.getElementById('sectionWithBariteBBL3').textContent = sectionWithBariteBBL3.toFixed(2);
    document.getElementById('sectionWithoutBariteBBL4').textContent = sectionWithoutBariteBBL3.toFixed(2);
    document.getElementById('sectionWithBariteBBL4').textContent = sectionWithBariteBBL4.toFixed(2);
    document.getElementById('sectionWithoutBariteBBL5').textContent = sectionWithoutBariteBBL3.toFixed(2);
    document.getElementById('sectionWithBariteBBL5').textContent = sectionWithBariteBBL5.toFixed(2);
    document.getElementById('sectionWithoutBariteBBL6').textContent = sectionWithoutBariteBBL3.toFixed(2);
    document.getElementById('sectionWithBariteBBL6').textContent = sectionWithBariteBBL6.toFixed(2);

    document.getElementById('sectionWithoutBariteBBL7').textContent = sectionWithoutBariteBBL7.toFixed(2);
    document.getElementById('sectionWithoutBariteBBL8').textContent = sectionWithoutBariteBBL8.toFixed(2);
    document.getElementById('sectionWithoutBariteBBL9').textContent = sectionWithoutBariteBBL9.toFixed(2);

    document.getElementById('sectionWithoutBariteBBL11').textContent = sectionWithoutBariteBBL11.toFixed(2);
    document.getElementById('sectionWithoutBariteBBL12').textContent = sectionWithoutBariteBBL12.toFixed(2);
    document.getElementById('sectionWithoutBariteBBL13').textContent = sectionWithoutBariteBBL13.toFixed(2);
    document.getElementById('sectionWithoutBariteBBL14').textContent = sectionWithoutBariteBBL14.toFixed(2);
    document.getElementById('sectionWithoutBariteBBL15').textContent = sectionWithoutBariteBBL15.toFixed(2);

    document.getElementById('sectionWithBariteBBL11').textContent = sectionWithBariteBBL11.toFixed(2);
    document.getElementById('sectionWithBariteBBL12').textContent = sectionWithBariteBBL12.toFixed(2);
    document.getElementById('sectionWithBariteBBL13').textContent = sectionWithBariteBBL13.toFixed(2);
    document.getElementById('sectionWithBariteBBL14').textContent = sectionWithBariteBBL14.toFixed(2);
    document.getElementById('sectionWithBariteBBL15').textContent = sectionWithBariteBBL15.toFixed(2);
    
    
    // Save to session
    sessionStorage.setItem('sectionWithBariteBBLValue1', sectionWithBariteBBL1);
    sessionStorage.setItem('sectionWithBariteBBLValue2', sectionWithBariteBBL2);
    sessionStorage.setItem('sectionWithBariteBBLValue3', sectionWithBariteBBL3);
    sessionStorage.setItem('sectionWithBariteBBLValue4', sectionWithBariteBBL4);
    sessionStorage.setItem('sectionWithBariteBBLValue5', sectionWithBariteBBL5);
    sessionStorage.setItem('sectionWithBariteBBLValue6', sectionWithBariteBBL6);
    
    
    sessionStorage.setItem('sectionWithBariteBBLValue11', sectionWithBariteBBL11);
    sessionStorage.setItem('sectionWithBariteBBLValue12', sectionWithBariteBBL12);
    sessionStorage.setItem('sectionWithBariteBBLValue13', sectionWithBariteBBL13);
    sessionStorage.setItem('sectionWithBariteBBLValue14', sectionWithBariteBBL14);
    sessionStorage.setItem('sectionWithBariteBBLValue15', sectionWithBariteBBL15);
    
    sessionStorage.setItem('sectionWithoutBariteBBLValue7', sectionWithoutBariteBBL7);
    sessionStorage.setItem('sectionWithoutBariteBBLValue8', sectionWithoutBariteBBL8);
    sessionStorage.setItem('sectionWithoutBariteBBLValue9', sectionWithoutBariteBBL9);
    
    sessionStorage.setItem('costPerBarrelValue10', costPerBarrelValue10);
    sessionStorage.setItem('costPerBarrelValue11', costPerBarrelValue11);
    sessionStorage.setItem('costPerBarrelValue12', costPerBarrelValue12);
    sessionStorage.setItem('costPerBarrelValue13', costPerBarrelValue13);
    sessionStorage.setItem('costPerBarrelValue14', costPerBarrelValue14);
    
    sessionStorage.setItem('costPerBarrelValue15', costPerBarrelValue15);
    sessionStorage.setItem('costPerBarrelValue16', costPerBarrelValue16);
    sessionStorage.setItem('costPerBarrelValue17', costPerBarrelValue17);
    sessionStorage.setItem('costPerBarrelValue18', costPerBarrelValue18);
    sessionStorage.setItem('costPerBarrelValue19', costPerBarrelValue19);
    
   
    
}


function calculate1(){
    var wellType1 = document.getElementById('wellType1').value;
    var wellType2 = document.getElementById('wellType2').value;
    var wellType3 = document.getElementById('wellType3').value;
    var wellType4 = document.getElementById('wellType4').value;
    var wellType5 = document.getElementById('wellType5').value;
    var wellType6 = document.getElementById('wellType6').value;
    var wellType7 = document.getElementById('wellType7').value;
    var wellType8 = document.getElementById('wellType8').value;
    var wellType9 = document.getElementById('wellType9').value;
    
    var waterDepth1 = parseFloat(document.getElementById('waterDepth1').value) || 0;
    var waterDepth2 = parseFloat(document.getElementById('waterDepth2').value) || 0;
    var waterDepth3 = parseFloat(document.getElementById('waterDepth3').value) || 0;
    var waterDepth4 = parseFloat(document.getElementById('waterDepth4').value) || 0;
    var waterDepth5 = parseFloat(document.getElementById('waterDepth5').value) || 0;
    var waterDepth6 = parseFloat(document.getElementById('waterDepth6').value) || 0;
    var waterDepth7 = parseFloat(document.getElementById('waterDepth7').value) || 0;
    var waterDepth8 = parseFloat(document.getElementById('waterDepth8').value) || 0;
    var waterDepth9 = parseFloat(document.getElementById('waterDepth9').value) || 0;

    
    var holeSize1 = document.getElementById('holeSize1').value;
    var holeSize2 = document.getElementById('holeSize2').value;
    var holeSize3 = document.getElementById('holeSize3').value;
    var holeSize4 = document.getElementById('holeSize4').value;
    var holeSize5 = document.getElementById('holeSize5').value;
    var holeSize6 = document.getElementById('holeSize6').value;
    var holeSize7 = document.getElementById('holeSize7').value;
    var holeSize8 = document.getElementById('holeSize8').value;
    var holeSize9 = document.getElementById('holeSize9').value;
    
    var MudWeight1 = document.getElementById('MudWeight1').value;
    var MudWeight2 = document.getElementById('MudWeight2').value;
    var MudWeight3 = document.getElementById('MudWeight3').value;
    var MudWeight4 = document.getElementById('MudWeight4').value;
    var MudWeight5 = document.getElementById('MudWeight5').value;
    var MudWeight6 = document.getElementById('MudWeight6').value;
    var MudWeight7 = document.getElementById('MudWeight7').value;
    var MudWeight8 = document.getElementById('MudWeight8').value;
    var MudWeight9 = document.getElementById('MudWeight9').value;
    
    var LossesFactor1 = parseFloat(document.getElementById('LossesFactor1').value);
    var LossesFactor2 = parseFloat(document.getElementById('LossesFactor2').value);
    var LossesFactor3 = parseFloat(document.getElementById('LossesFactor3').value);
    var LossesFactor4 = parseFloat(document.getElementById('LossesFactor4').value);
    var LossesFactor5 = parseFloat(document.getElementById('LossesFactor5').value);
    var LossesFactor6 = parseFloat(document.getElementById('LossesFactor6').value);
    var LossesFactor7 = parseFloat(document.getElementById('LossesFactor7').value);
    var LossesFactor8 = parseFloat(document.getElementById('LossesFactor8').value);
    var LossesFactor9 = parseFloat(document.getElementById('LossesFactor9').value);
    
    
    var footageDrilled1 = parseFloat(document.getElementById('footageDrilled1').value) || 0;
    var footageDrilled2 = parseFloat(document.getElementById('footageDrilled2').value) || 0;
    var footageDrilled3 = parseFloat(document.getElementById('footageDrilled3').value) || 0;
    var footageDrilled4 = parseFloat(document.getElementById('footageDrilled4').value) || 0;
    var footageDrilled5 = parseFloat(document.getElementById('footageDrilled5').value) || 0;
    var footageDrilled6 = parseFloat(document.getElementById('footageDrilled6').value) || 0;
    var footageDrilled7 = parseFloat(document.getElementById('footageDrilled7').value) || 0;
    var footageDrilled8 = parseFloat(document.getElementById('footageDrilled8').value) || 0;
    var footageDrilled9 = parseFloat(document.getElementById('footageDrilled9').value) || 0;
    
    var wellCleanUp1 = document.getElementById('wellCleanUp1').value;
    
    var BrineWeight1 = document.getElementById('BrineWeight1').value;
    var BrineWeight2 = document.getElementById('BrineWeight2').value;
    var BrineWeight3 = document.getElementById('BrineWeight3').value;
    var BrineWeight4 = document.getElementById('BrineWeight4').value;
    var BrineWeight5 = document.getElementById('BrineWeight5').value;
    
    var SectionFootage1 = parseFloat(document.getElementById('SectionFootage1').value) || 0;
    var SectionFootage2 = parseFloat(document.getElementById('SectionFootage2').value) || 0;
    var SectionFootage3 = parseFloat(document.getElementById('SectionFootage3').value) || 0;
    var SectionFootage4 = parseFloat(document.getElementById('SectionFootage4').value) || 0;
    var SectionFootage5 = parseFloat(document.getElementById('SectionFootage5').value) || 0;
    
    var CasingVolume1 = parseFloat(document.getElementById('CasingVolume1').value) || 0;
    var CasingVolume2 = parseFloat(document.getElementById('CasingVolume2').value) || 0;
    var CasingVolume3 = parseFloat(document.getElementById('CasingVolume3').value) || 0;
    var CasingVolume4 = parseFloat(document.getElementById('CasingVolume4').value) || 0;
    var CasingVolume5 = parseFloat(document.getElementById('CasingVolume5').value) || 0;

    var LossesFactor10 = parseFloat(document.getElementById('LossesFactor10').value);
    var LossesFactor11 = parseFloat(document.getElementById('LossesFactor11').value);
    var LossesFactor12 = parseFloat(document.getElementById('LossesFactor12').value);
    var LossesFactor13 = parseFloat(document.getElementById('LossesFactor13').value);
    var LossesFactor14 = parseFloat(document.getElementById('LossesFactor14').value);
    
    sessionStorage.setItem('LossesFactorValue10', LossesFactor10);
    sessionStorage.setItem('LossesFactorValue11', LossesFactor11);
    sessionStorage.setItem('LossesFactorValue12', LossesFactor12);
    sessionStorage.setItem('LossesFactorValue13', LossesFactor13);
    sessionStorage.setItem('LossesFactorValue14', LossesFactor14);
    
    var totalCostPerSection1 = (costPerFootDrilled1 * footageDrilled1) * (1 + LossesFactor1);
    var totalCostPerSection2 = (costPerFootDrilled2 * footageDrilled2) * (1 + LossesFactor2);
    var totalCostPerSection3 = (costPerFootDrilled3 * footageDrilled3) * (1 + LossesFactor3);
    var totalCostPerSection4 = (costPerFootDrilled4 * footageDrilled4) * (1 + LossesFactor4);
    var totalCostPerSection5 = (costPerFootDrilled5 * footageDrilled5) * (1 + LossesFactor5);
    var totalCostPerSection6 = (costPerFootDrilled6 * footageDrilled6) * (1 + LossesFactor6);
    var totalCostPerSection7 = (costPerFootDrilled7 * footageDrilled7) * (1 + LossesFactor7);
    var totalCostPerSection8 = (costPerFootDrilled8 * footageDrilled8) * (1 + LossesFactor8);
    var totalCostPerSection9 = (costPerFootDrilled9 * footageDrilled9) * (1 + LossesFactor9);
    
    var totalDrillingFuildsCost1 = totalCostPerSection1 + totalCostPerSection2 + totalCostPerSection3 + totalCostPerSection4 + totalCostPerSection5 + totalCostPerSection6 + totalCostPerSection7 + totalCostPerSection8 + totalCostPerSection9;
    
    // Completion Parameters
    var dilutionLosses10 = SectionFootage1 * 0.35;
    var dilutionLosses11 = SectionFootage2 * 0.35;
    var dilutionLosses12 = SectionFootage3 * 0.35;
    var dilutionLosses13 = SectionFootage4 * 0.35;
    var dilutionLosses14 = SectionFootage5 * 0.35;
    
    var contingency10 = (SectionFootage1 + 800 + CasingVolume1) * 0.2;
    var contingency11 = (SectionFootage2 + 800 + CasingVolume2) * 0.2;
    var contingency12 = (SectionFootage3 + 800 + CasingVolume3) * 0.2;
    var contingency13 = (SectionFootage4 + 800 + CasingVolume4) * 0.2;
    var contingency14 = (SectionFootage5 + 800 + CasingVolume5) * 0.2;
    
    var totalVolumeRequired10 = SectionFootage1 + 800 + CasingVolume1 + dilutionLosses10 + contingency10;
    var totalVolumeRequired11 = SectionFootage2 + 800 + CasingVolume2 + dilutionLosses11 + contingency11;
    var totalVolumeRequired12 = SectionFootage3 + 800 + CasingVolume3 + dilutionLosses12 + contingency12;
    var totalVolumeRequired13 = SectionFootage4 + 800 + CasingVolume4 + dilutionLosses13 + contingency13;
    var totalVolumeRequired14 = SectionFootage5 + 800 + CasingVolume5 + dilutionLosses14 + contingency14;
    
    var ppb36 = 672 * ((((BrineWeight1 / 0.052) - 8.33)/ (16 - 8.33))) * 0.8;
    var ppb37 = 696 * (((BrineWeight2 / 0.052) - 8.33) / (16.58-8.33)) * 0.9;
    var ppb38 = 742 * (((BrineWeight3 / 0.052) -8.33)/(17.66 - 8.33)) * 0.82;
    var ppb39 = 766 * (((BrineWeight4 / 0.052) -8.33) / (18.24-8.33)) * 0.82;
    var ppb40 = 822 * (((BrineWeight5 / 0.052) -8.33) / (19.58-8.33)) * 0.82;
    
    var cost36 =  parseFloat(sessionStorage.getItem('costValue36')) || 0;
    var cost37 =  parseFloat(sessionStorage.getItem('costValue37')) || 0;
    var cost38 =  parseFloat(sessionStorage.getItem('costValue38')) || 0;
    var cost39 =  parseFloat(sessionStorage.getItem('costValue39')) || 0;
    var cost40 =  parseFloat(sessionStorage.getItem('costValue40')) || 0;
    
    var quantity36 =  ppb36 / 2200;
    var quantity37 =  ppb37 / 2200;
    var quantity38 =  ppb38 / 2200;
    var quantity39 =  ppb39 / 2.2 / 25;
    var quantity40 =  ppb40 / 2.2 / 25;
    
    var costPerBarrel1 = cost36 * quantity36;
    var costPerBarrel2 = cost37 * quantity37;
    var costPerBarrel3 = cost38 * quantity38;
    var costPerBarrel4 = cost39 * quantity39;
    var costPerBarrel5 = cost40 * quantity40;
    
    var costPerFoot1 = costPerBarrel1 * (totalVolumeRequired10 / SectionFootage1);
    var costPerFoot2 = costPerBarrel2 * (totalVolumeRequired11 / SectionFootage2);
    var costPerFoot3 = costPerBarrel3 * (totalVolumeRequired12 / SectionFootage3);
    var costPerFoot4 = costPerBarrel4 * (totalVolumeRequired13 / SectionFootage4);
    var costPerFoot5 = costPerBarrel5 * (totalVolumeRequired14 / SectionFootage5);
    
    var totalCostPerSection10 = (costPerFoot1 * SectionFootage1) * ( 1 + LossesFactor10);
    var totalCostPerSection11 = (costPerFoot2 * SectionFootage2) * ( 1 + LossesFactor11);
    var totalCostPerSection12 = (costPerFoot3 * SectionFootage3) * ( 1 + LossesFactor12);
    var totalCostPerSection13 = (costPerFoot4 * SectionFootage4) * ( 1 + LossesFactor13);
    var totalCostPerSection14 = (costPerFoot5 * SectionFootage5) * ( 1 + LossesFactor14);

    var totalCompletionFluidsCost1 = totalCostPerSection10 + totalCostPerSection11 + totalCostPerSection12 + totalCostPerSection13 + totalCostPerSection14;
    
 
    var totalCompletionFluidsCost1Num = parseFloat(totalCompletionFluidsCost1);
    var wellCleanUp1Num = parseFloat(wellCleanUp1);
    var totalDrillingFuildsCost1Num = parseFloat(totalDrillingFuildsCost1);

    
    var totalWellCostOnFluids1 = totalCompletionFluidsCost1Num + wellCleanUp1Num + totalDrillingFuildsCost1Num;
    
    document.getElementById('totalCompletionFluidsCost1').textContent = parseFloat(totalCompletionFluidsCost1).toFixed(2) || '0';
    
    document.getElementById('totalWellCostOnFluids1').textContent = parseFloat(totalWellCostOnFluids1).toFixed(2) || '0';

    
    document.getElementById('costPerFoot1').textContent = parseFloat(costPerFoot1).toFixed(2) || '0';
    document.getElementById('costPerFoot2').textContent = parseFloat(costPerFoot2).toFixed(2) || '0';
    document.getElementById('costPerFoot3').textContent = parseFloat(costPerFoot3).toFixed(2) || '0';
    document.getElementById('costPerFoot4').textContent = parseFloat(costPerFoot4).toFixed(2) || '0';
    document.getElementById('costPerFoot5').textContent = parseFloat(costPerFoot5).toFixed(2) || '0';
    
    document.getElementById('totalCostPerSection10').textContent = parseFloat(totalCostPerSection10).toFixed(2) || '0';
    document.getElementById('totalCostPerSection11').textContent = parseFloat(totalCostPerSection11).toFixed(2) || '0';
    document.getElementById('totalCostPerSection12').textContent = parseFloat(totalCostPerSection12).toFixed(2) || '0';
    document.getElementById('totalCostPerSection13').textContent = parseFloat(totalCostPerSection13).toFixed(2) || '0';
    document.getElementById('totalCostPerSection14').textContent = parseFloat(totalCostPerSection14).toFixed(2) || '0';
   
    document.getElementById('totalCostPerSection1').textContent = parseFloat(totalCostPerSection1).toFixed(2) || '0';
    document.getElementById('totalCostPerSection2').textContent = parseFloat(totalCostPerSection2).toFixed(2) || '0';
    document.getElementById('totalCostPerSection3').textContent = parseFloat(totalCostPerSection3).toFixed(2) || '0';
    document.getElementById('totalCostPerSection4').textContent = parseFloat(totalCostPerSection4).toFixed(2) || '0';
    document.getElementById('totalCostPerSection5').textContent = parseFloat(totalCostPerSection5).toFixed(2) || '0';
    document.getElementById('totalCostPerSection6').textContent = parseFloat(totalCostPerSection6).toFixed(2) || '0';
    document.getElementById('totalCostPerSection7').textContent = parseFloat(totalCostPerSection7).toFixed(2) || '0';
    document.getElementById('totalCostPerSection8').textContent = parseFloat(totalCostPerSection8).toFixed(2) || '0';
    document.getElementById('totalCostPerSection9').textContent = parseFloat(totalCostPerSection9).toFixed(2) || '0';
    
    document.getElementById('totalDrillingFuildsCost1').textContent = parseFloat(totalDrillingFuildsCost1).toFixed(2) || '0';
    
    sessionStorage.setItem('wellTypeValue1', wellType1);
    sessionStorage.setItem('wellTypeValue2', wellType2);
    sessionStorage.setItem('wellTypeValue3', wellType3);
    sessionStorage.setItem('wellTypeValue4', wellType4);
    sessionStorage.setItem('wellTypeValue5', wellType5);
    sessionStorage.setItem('wellTypeValue6', wellType6);
    sessionStorage.setItem('wellTypeValue7', wellType7);
    sessionStorage.setItem('wellTypeValue8', wellType8);
    sessionStorage.setItem('wellTypeValue9', wellType9);
    
    sessionStorage.setItem('waterDepthValue1', waterDepth1);
    sessionStorage.setItem('waterDepthValue2', waterDepth2);
    sessionStorage.setItem('waterDepthValue3', waterDepth3);
    sessionStorage.setItem('waterDepthValue4', waterDepth4);
    sessionStorage.setItem('waterDepthValue5', waterDepth5);
    sessionStorage.setItem('waterDepthValue6', waterDepth6);
    sessionStorage.setItem('waterDepthValue7', waterDepth7);
    sessionStorage.setItem('waterDepthValue8', waterDepth8);
    sessionStorage.setItem('waterDepthValue9', waterDepth9);
    
    sessionStorage.setItem('holeSizeValue1', holeSize1);
    sessionStorage.setItem('holeSizeValue2', holeSize2);
    sessionStorage.setItem('holeSizeValue3', holeSize3);
    sessionStorage.setItem('holeSizeValue4', holeSize4);
    sessionStorage.setItem('holeSizeValue5', holeSize5);
    sessionStorage.setItem('holeSizeValue6', holeSize6);
    sessionStorage.setItem('holeSizeValue7', holeSize7);
    sessionStorage.setItem('holeSizeValue8', holeSize8);
    sessionStorage.setItem('holeSizeValue9', holeSize9);
    
    sessionStorage.setItem('MudWeightValue1', MudWeight1);
    sessionStorage.setItem('MudWeightValue2', MudWeight2);
    sessionStorage.setItem('MudWeightValue3', MudWeight3);
    sessionStorage.setItem('MudWeightValue4', MudWeight4);
    sessionStorage.setItem('MudWeightValue5', MudWeight5);
    sessionStorage.setItem('MudWeightValue6', MudWeight6);
    sessionStorage.setItem('MudWeightValue7', MudWeight7);
    sessionStorage.setItem('MudWeightValue8', MudWeight8);
    sessionStorage.setItem('MudWeightValue9', MudWeight9);
    
    sessionStorage.setItem('LossesFactorValue1', LossesFactor1);
    sessionStorage.setItem('LossesFactorValue2', LossesFactor2);
    sessionStorage.setItem('LossesFactorValue3', LossesFactor3);
    sessionStorage.setItem('LossesFactorValue4', LossesFactor4);
    sessionStorage.setItem('LossesFactorValue5', LossesFactor5);
    sessionStorage.setItem('LossesFactorValue6', LossesFactor6);
    sessionStorage.setItem('LossesFactorValue7', LossesFactor7);
    sessionStorage.setItem('LossesFactorValue8', LossesFactor8);
    sessionStorage.setItem('LossesFactorValue9', LossesFactor9);
    
    sessionStorage.setItem('footageDrilledValue1', footageDrilled1);
    sessionStorage.setItem('footageDrilledValue2', footageDrilled2);
    sessionStorage.setItem('footageDrilledValue3', footageDrilled3);
    sessionStorage.setItem('footageDrilledValue4', footageDrilled4);
    sessionStorage.setItem('footageDrilledValue5', footageDrilled5);
    sessionStorage.setItem('footageDrilledValue6', footageDrilled6);
    sessionStorage.setItem('footageDrilledValue7', footageDrilled7);
    sessionStorage.setItem('footageDrilledValue8', footageDrilled8);
    sessionStorage.setItem('footageDrilledValue9', footageDrilled9);
    
    sessionStorage.setItem('wellCleanUpValue1', wellCleanUp1);
    
    sessionStorage.setItem('BrineWeightValue1', BrineWeight1);
    sessionStorage.setItem('BrineWeightValue2', BrineWeight2);
    sessionStorage.setItem('BrineWeightValue3', BrineWeight3);
    sessionStorage.setItem('BrineWeightValue4', BrineWeight4);
    sessionStorage.setItem('BrineWeightValue5', BrineWeight5);
    
    sessionStorage.setItem('SectionFootageValue1', SectionFootage1);
    sessionStorage.setItem('SectionFootageValue2', SectionFootage2);
    sessionStorage.setItem('SectionFootageValue3', SectionFootage3);
    sessionStorage.setItem('SectionFootageValue4', SectionFootage4);
    sessionStorage.setItem('SectionFootageValue5', SectionFootage5);
    
    sessionStorage.setItem('CasingVolumeValue1', CasingVolume1);
    sessionStorage.setItem('CasingVolumeValue2', CasingVolume2);
    sessionStorage.setItem('CasingVolumeValue3', CasingVolume3);
    sessionStorage.setItem('CasingVolumeValue4', CasingVolume4);
    sessionStorage.setItem('CasingVolumeValue5', CasingVolume5);
    
    
}

function calculate2() {

    var to1 =  parseFloat(document.getElementById('to1').value) || 0;
    var to2 =  parseFloat(document.getElementById('to2').value) || 0;
    var to3 =  parseFloat(document.getElementById('to3').value) || 0;
    var to4 =  parseFloat(document.getElementById('to4').value) || 0;
    var to5 =  parseFloat(document.getElementById('to5').value) || 0;
    var to6 =  parseFloat(document.getElementById('to6').value) || 0;
    var to7 =  parseFloat(document.getElementById('to7').value) || 0;
    var to8 =  parseFloat(document.getElementById('to8').value) || 0;
    var to9 =  parseFloat(document.getElementById('to9').value) || 0;
    
    var prCasingFrom1 =  parseFloat(document.getElementById('prCasingFrom1').value) || 0;
    var prCasingFrom2 =  parseFloat(document.getElementById('prCasingFrom2').value) || 0;
    var prCasingFrom3 =  parseFloat(document.getElementById('prCasingFrom3').value) || 0;
    var prCasingFrom4 =  parseFloat(document.getElementById('prCasingFrom4').value) || 0;
    var prCasingFrom5 =  parseFloat(document.getElementById('prCasingFrom5').value) || 0;
    var prCasingFrom6 =  parseFloat(document.getElementById('prCasingFrom6').value) || 0;
    var prCasingFrom7 =  parseFloat(document.getElementById('prCasingFrom7').value) || 0;
    var prCasingFrom8 =  parseFloat(document.getElementById('prCasingFrom8').value) || 0;
    var prCasingFrom9 =  parseFloat(document.getElementById('prCasingFrom9').value) || 0;
    
    var prCasingTo1 = parseFloat(document.getElementById('prCasingTo1').value) || 0;
    var prCasingTo2 = parseFloat(document.getElementById('prCasingTo2').value) || 0;
    var prCasingTo3 = parseFloat(document.getElementById('prCasingTo3').value) || 0;
    var prCasingTo4 = parseFloat(document.getElementById('prCasingTo4').value) || 0;
    var prCasingTo5 = parseFloat(document.getElementById('prCasingTo5').value) || 0;
    var prCasingTo6 = parseFloat(document.getElementById('prCasingTo6').value) || 0;
    var prCasingTo7 = parseFloat(document.getElementById('prCasingTo7').value) || 0;
    var prCasingTo8 = parseFloat(document.getElementById('prCasingTo8').value) || 0;
    var prCasingTo9 = parseFloat(document.getElementById('prCasingTo9').value) || 0;
    
    var prCasingId1 = parseFloat(document.getElementById('prCasingId1').value) || 0;
    var prCasingId2 = parseFloat(document.getElementById('prCasingId2').value) || 0;
    var prCasingId3 = parseFloat(document.getElementById('prCasingId3').value) || 0;
    var prCasingId4 = parseFloat(document.getElementById('prCasingId4').value) || 0;
    var prCasingId5 = parseFloat(document.getElementById('prCasingId5').value) || 0;
    var prCasingId6 = parseFloat(document.getElementById('prCasingId6').value) || 0;
    var prCasingId7 = parseFloat(document.getElementById('prCasingId7').value) || 0;
    var prCasingId8 = parseFloat(document.getElementById('prCasingId8').value) || 0;
    var prCasingId9 = parseFloat(document.getElementById('prCasingId9').value) || 0;
    
    var surfaceVolume1 = parseFloat(document.getElementById('surfaceVolume1').textContent) || 0;
    var surfaceVolume2 = parseFloat(document.getElementById('surfaceVolume2').textContent) || 0;
    var surfaceVolume3 = parseFloat(document.getElementById('surfaceVolume3').textContent) || 0;
    var surfaceVolume4 = parseFloat(document.getElementById('surfaceVolume4').textContent) || 0;
    var surfaceVolume5 = parseFloat(document.getElementById('surfaceVolume5').textContent) || 0;
    var surfaceVolume6 = parseFloat(document.getElementById('surfaceVolume6').textContent) || 0;
    var surfaceVolume7 = parseFloat(document.getElementById('surfaceVolume7').textContent) || 0;
    var surfaceVolume8 = parseFloat(document.getElementById('surfaceVolume8').textContent) || 0;
    var surfaceVolume9 = parseFloat(document.getElementById('surfaceVolume9').textContent) || 0;
    
    var LossesFactorValue10 = parseFloat(sessionStorage.getItem('LossesFactorValue10')) || 0;
    var LossesFactorValue11 = parseFloat(sessionStorage.getItem('LossesFactorValue11')) || 0;
    var LossesFactorValue12 = parseFloat(sessionStorage.getItem('LossesFactorValue12')) || 0;
    var LossesFactorValue13 = parseFloat(sessionStorage.getItem('LossesFactorValue13')) || 0;
    var LossesFactorValue14 = parseFloat(sessionStorage.getItem('LossesFactorValue14')) || 0;
         
    sessionStorage.setItem('LossesFactorValue10', LossesFactorValue10);
    sessionStorage.setItem('LossesFactorValue11', LossesFactorValue11);
    sessionStorage.setItem('LossesFactorValue12', LossesFactorValue12);
    sessionStorage.setItem('LossesFactorValue13', LossesFactorValue13);
    sessionStorage.setItem('LossesFactorValue14', LossesFactorValue14);
    
    sessionStorage.setItem('toValue1', to1);
    sessionStorage.setItem('toValue2', to2);
    sessionStorage.setItem('toValue3', to3);
    sessionStorage.setItem('toValue4', to4);
    sessionStorage.setItem('toValue5', to5);
    sessionStorage.setItem('toValue6', to6);
    sessionStorage.setItem('toValue7', to7);
    sessionStorage.setItem('toValue8', to8);
    sessionStorage.setItem('toValue9', to9);
    
    sessionStorage.setItem('prCasingFromValue1', prCasingFrom1);
    sessionStorage.setItem('prCasingFromValue2', prCasingFrom2);
    sessionStorage.setItem('prCasingFromValue3', prCasingFrom3);
    sessionStorage.setItem('prCasingFromValue4', prCasingFrom4);
    sessionStorage.setItem('prCasingFromValue5', prCasingFrom5);
    sessionStorage.setItem('prCasingFromValue6', prCasingFrom6);
    sessionStorage.setItem('prCasingFromValue7', prCasingFrom7);
    sessionStorage.setItem('prCasingFromValue8', prCasingFrom8);
    sessionStorage.setItem('prCasingFromValue9', prCasingFrom9);
    
    sessionStorage.setItem('prCasingToValue1', prCasingTo1);
    sessionStorage.setItem('prCasingToValue2', prCasingTo2);
    sessionStorage.setItem('prCasingToValue3', prCasingTo3);
    sessionStorage.setItem('prCasingToValue4', prCasingTo4);
    sessionStorage.setItem('prCasingToValue5', prCasingTo5);
    sessionStorage.setItem('prCasingToValue6', prCasingTo6);
    sessionStorage.setItem('prCasingToValue7', prCasingTo7);
    sessionStorage.setItem('prCasingToValue8', prCasingTo8);
    sessionStorage.setItem('prCasingToValue9', prCasingTo9);
    
    sessionStorage.setItem('prCasingIdValue1', prCasingId1);
    sessionStorage.setItem('prCasingIdValue2', prCasingId2);
    sessionStorage.setItem('prCasingIdValue3', prCasingId3);
    sessionStorage.setItem('prCasingIdValue4', prCasingId4);
    sessionStorage.setItem('prCasingIdValue5', prCasingId5);
    sessionStorage.setItem('prCasingIdValue6', prCasingId6);
    sessionStorage.setItem('prCasingIdValue7', prCasingId7);
    sessionStorage.setItem('prCasingIdValue8', prCasingId8);
    sessionStorage.setItem('prCasingIdValue9', prCasingId9);
    

    var casingVolume1 = ((prCasingTo1 - prCasingFrom1) * prCasingId1 * prCasingId1) / 1029;
    var casingVolume2 = ((prCasingTo2 - prCasingFrom2) * prCasingId2 * prCasingId2) / 1029;
    var casingVolume3 = ((prCasingTo3 - prCasingFrom3) * prCasingId3 * prCasingId3) / 1029;
    var casingVolume4 = ((prCasingTo4 - prCasingFrom4) * prCasingId4 * prCasingId4) / 1029;
    var casingVolume5 = ((prCasingTo5 - prCasingFrom5) * prCasingId5 * prCasingId5) / 1029;
    var casingVolume6 = ((prCasingTo6 - prCasingFrom6) * prCasingId6 * prCasingId6) / 1029;
    var casingVolume7 = ((prCasingTo7 - prCasingFrom7) * prCasingId7 * prCasingId7) / 1029;
    var casingVolume8 = ((prCasingTo8 - prCasingFrom8) * prCasingId8 * prCasingId8) / 1029;
    var casingVolume9 = ((prCasingTo9 - prCasingFrom9) * prCasingId9 * prCasingId9) / 1029;
    
    var openHoleVolume1 = (footageDrilled1 * size1 * size1 ) / 1029;
    var openHoleVolume2 = (footageDrilled2 * size2 * size2 ) / 1029;
    var openHoleVolume3 = (footageDrilled3 * size3 * size3 ) / 1029 * 2;
    var openHoleVolume4 = (footageDrilled4 * size4 * size4 ) / 1029 * 3;
    var openHoleVolume5 = (footageDrilled5 * size5 * size5 ) / 1029 * 4;
    var openHoleVolume6 = (footageDrilled6 * size6 * size6 ) / 1029 * 5;
    var openHoleVolume7 = (footageDrilled7 * size7 * size7 ) / 1029 * 2;
    var openHoleVolume8 = (footageDrilled8 * size8 * size8 ) / 1029 * 3;
    var openHoleVolume9 = (footageDrilled9 * size9 * size9 ) / 1029 * 4;
    
    var dilutionLosses1 = 0.35 * footageDrilled1;
    var dilutionLosses3 = 0.35 * footageDrilled3;
    var dilutionLosses4 = 0.35 * footageDrilled4;
    var dilutionLosses5 = 0.35 * footageDrilled5;
    var dilutionLosses6 = 0.35 * footageDrilled6;
    var dilutionLosses7 = 0.35 * footageDrilled7;
    var dilutionLosses8 = 0.35 * footageDrilled8;
    var dilutionLosses9 = 0.35 * footageDrilled9;
    
    var contingency1 = (surfaceVolume1 + casingVolume1 + openHoleVolume1) * 0.2;
    var contingency3 = (surfaceVolume3 + casingVolume3 + openHoleVolume3) * 0.2;
    var contingency4 = (surfaceVolume4 + casingVolume4 + openHoleVolume4) * 0.2;
    var contingency5 = (surfaceVolume5 + casingVolume5 + openHoleVolume5) * 0.2;
    var contingency6 = (surfaceVolume6 + casingVolume6 + openHoleVolume6) * 0.2;
    var contingency7 = (surfaceVolume7 + casingVolume7 + openHoleVolume7) * 0.2;
    var contingency8 = (surfaceVolume8 + casingVolume8 + openHoleVolume8) * 0.2;
    var contingency9 = (surfaceVolume9 + casingVolume9 + openHoleVolume9) * 0.2;
    
    var holeVolume1 = casingVolume1 + openHoleVolume1;
    var holeVolume2 = casingVolume2 + openHoleVolume2;
    var holeVolume3 = casingVolume3 + openHoleVolume3;
    var holeVolume4 = casingVolume4 + openHoleVolume4;
    var holeVolume5 = casingVolume5 + openHoleVolume5;
    var holeVolume6 = casingVolume6 + openHoleVolume6;
    var holeVolume7 = casingVolume7 + openHoleVolume7;
    var holeVolume8 = casingVolume8 + openHoleVolume8;
    var holeVolume9 = casingVolume9 + openHoleVolume9;
    
    var totalVolumeRequired1 = surfaceVolume1 + casingVolume1 + openHoleVolume1 + dilutionLosses1 + contingency1;
    var totalVolumeRequired2 = ((surfaceVolume2 + openHoleVolume2) + ((footageDrilled2/100) * 1429)) * 0.4;
    var totalVolumeRequired3 = surfaceVolume3 + casingVolume3 + openHoleVolume3 + dilutionLosses3 + contingency3;
    var totalVolumeRequired4 = surfaceVolume4 + casingVolume4 + openHoleVolume4 + dilutionLosses4 + contingency4;
    var totalVolumeRequired5 = surfaceVolume5 + casingVolume5 + openHoleVolume5 + dilutionLosses5 + contingency5;
    var totalVolumeRequired6 = surfaceVolume6 + casingVolume6 + openHoleVolume6 + dilutionLosses6 + contingency6;
    var totalVolumeRequired7 = surfaceVolume7 + casingVolume7 + openHoleVolume7 + dilutionLosses7 + contingency7;
    var totalVolumeRequired8 = surfaceVolume8 + casingVolume8 + openHoleVolume8 + dilutionLosses8 + contingency8;
    var totalVolumeRequired9 = surfaceVolume9 + casingVolume9 + openHoleVolume9 + dilutionLosses9 + contingency9;
    
    var mudLeft1 = totalVolumeRequired1 - dilutionLosses1 - contingency1;
    var mudLeft2 = totalVolumeRequired2;
    var mudLeft3 = totalVolumeRequired3 - dilutionLosses3 - contingency3;
    var mudLeft4 = totalVolumeRequired4 - dilutionLosses4 - contingency4;
    var mudLeft5 = totalVolumeRequired5 - dilutionLosses5 - contingency5;
    var mudLeft6 = totalVolumeRequired6 - dilutionLosses6 - contingency6;
    var mudLeft7 = totalVolumeRequired7 - dilutionLosses7 - contingency7;
    var mudLeft8 = totalVolumeRequired8 - dilutionLosses8 - contingency8;
    var mudLeft9 = totalVolumeRequired9 - dilutionLosses9 - contingency9;    
    
    var mudReceived1 = 0;
    var mudReceived2 = 0;
    var mudReceived3 = 0;
    var mudReceived4 = mudLeft3;
    var mudReceived5 = mudLeft4;
    var mudReceived6 = mudLeft5;
    var mudReceived7 = 0;
    var mudReceived8 = mudLeft7;
    var mudReceived9 = mudLeft8;

    var newMud1 = totalVolumeRequired1 - mudReceived1;
    var newMud2 = totalVolumeRequired2 - mudReceived2;
    var newMud3 = totalVolumeRequired3 - mudReceived3;
    var newMud4 = totalVolumeRequired4 - mudReceived4;
    var newMud5 = totalVolumeRequired5 - mudReceived5;
    var newMud6 = totalVolumeRequired6 - mudReceived6;
    var newMud7 = totalVolumeRequired7 - mudReceived7;
    var newMud8 = totalVolumeRequired8 - mudReceived8;
    var newMud9 = totalVolumeRequired9 - mudReceived9;
    
    var costPerFootDrilled1 = costPerBarrel1 * (newMud1 / footageDrilled1);
    var costPerFootDrilled2 = costPerBarrel2 * (newMud2 / footageDrilled2);
    var costPerFootDrilled3 = costPerBarrel3 * (newMud3 / footageDrilled3) * 0.8;
    var costPerFootDrilled4 = costPerBarrel4 * (newMud4 / footageDrilled4);
    var costPerFootDrilled5 = costPerBarrel5 * (newMud5 / footageDrilled5);
    var costPerFootDrilled6 = costPerBarrel6 * (newMud6 / footageDrilled6);
    var costPerFootDrilled7 = costPerBarrel7 * (newMud7 / footageDrilled7);
    var costPerFootDrilled8 = costPerBarrel8 * (newMud8 / footageDrilled8);
    var costPerFootDrilled9 = costPerBarrel9 * (newMud9 / footageDrilled9);
    
    var dilutionLosses10 = totalFootage1 * 0.35;
    var dilutionLosses11 = totalFootage2 * 0.35;
    var dilutionLosses12 = totalFootage3 * 0.35;
    var dilutionLosses13 = totalFootage4 * 0.35;
    var dilutionLosses14 = totalFootage5 * 0.35;
    
    var contingency10 = (totalFootage1 + surfaceVolume10 + casingVolume10) * 0.2;
    var contingency11 = (totalFootage2 + surfaceVolume11 + casingVolume11) * 0.2;
    var contingency12 = (totalFootage3 + surfaceVolume12 + casingVolume12) * 0.2;
    var contingency13 = (totalFootage4 + surfaceVolume13 + casingVolume13) * 0.2;
    var contingency14 = (totalFootage5 + surfaceVolume14 + casingVolume14) * 0.2;
    
    var totalVolumeRequired10 = totalFootage1 + surfaceVolume10 + casingVolume10 + dilutionLosses10 + contingency10;
    var totalVolumeRequired11 = totalFootage2 + surfaceVolume11 + casingVolume11 + dilutionLosses11 + contingency11;
    var totalVolumeRequired12 = totalFootage3 + surfaceVolume12 + casingVolume12 + dilutionLosses12 + contingency12;
    var totalVolumeRequired13 = totalFootage4 + surfaceVolume13 + casingVolume13 + dilutionLosses13 + contingency13;
    var totalVolumeRequired14 = totalFootage5 + surfaceVolume14 + casingVolume14 + dilutionLosses14 + contingency14;
    
    var costPerFoot1 = costPerBarrel10 * (totalVolumeRequired10 / totalFootage1);
    var costPerFoot2 = costPerBarrel11 * (totalVolumeRequired11 / totalFootage2);
    var costPerFoot3 = costPerBarrel12 * (totalVolumeRequired12 / totalFootage3);
    var costPerFoot4 = costPerBarrel13 * (totalVolumeRequired13 / totalFootage4);
    var costPerFoot5 = costPerBarrel14 * (totalVolumeRequired14 / totalFootage5);
    
    document.getElementById('casingVolume1').textContent = casingVolume1.toFixed(0);
    document.getElementById('casingVolume2').textContent = casingVolume2.toFixed(0);
    document.getElementById('casingVolume3').textContent = casingVolume3.toFixed(0);
    document.getElementById('casingVolume4').textContent = casingVolume4.toFixed(0);
    document.getElementById('casingVolume5').textContent = casingVolume5.toFixed(0);
    document.getElementById('casingVolume6').textContent = casingVolume6.toFixed(0);
    document.getElementById('casingVolume7').textContent = casingVolume7.toFixed(0);
    document.getElementById('casingVolume8').textContent = casingVolume8.toFixed(0);
    document.getElementById('casingVolume9').textContent = casingVolume9.toFixed(0);
    
    document.getElementById('openHoleVolume1').textContent = openHoleVolume1.toFixed(0);
    document.getElementById('openHoleVolume2').textContent = openHoleVolume2.toFixed(0);
    document.getElementById('openHoleVolume3').textContent = openHoleVolume3.toFixed(0);
    document.getElementById('openHoleVolume4').textContent = openHoleVolume4.toFixed(0);
    document.getElementById('openHoleVolume5').textContent = openHoleVolume5.toFixed(0);
    document.getElementById('openHoleVolume6').textContent = openHoleVolume6.toFixed(0);
    document.getElementById('openHoleVolume7').textContent = openHoleVolume7.toFixed(0);
    document.getElementById('openHoleVolume8').textContent = openHoleVolume8.toFixed(0);
    document.getElementById('openHoleVolume9').textContent = openHoleVolume9.toFixed(0);
    
    document.getElementById('dilutionLosses1').textContent = dilutionLosses1.toFixed(0);
    document.getElementById('dilutionLosses3').textContent = dilutionLosses3.toFixed(0);
    document.getElementById('dilutionLosses4').textContent = dilutionLosses4.toFixed(0);
    document.getElementById('dilutionLosses5').textContent = dilutionLosses5.toFixed(0);
    document.getElementById('dilutionLosses6').textContent = dilutionLosses6.toFixed(0);
    document.getElementById('dilutionLosses7').textContent = dilutionLosses7.toFixed(0);
    document.getElementById('dilutionLosses8').textContent = dilutionLosses8.toFixed(0);
    document.getElementById('dilutionLosses9').textContent = dilutionLosses9.toFixed(0);
    
    document.getElementById('contingency1').textContent = contingency1.toFixed(0);
    document.getElementById('contingency3').textContent = contingency3.toFixed(0);
    document.getElementById('contingency4').textContent = contingency4.toFixed(0);
    document.getElementById('contingency5').textContent = contingency5.toFixed(0);
    document.getElementById('contingency6').textContent = contingency6.toFixed(0);
    document.getElementById('contingency7').textContent = contingency7.toFixed(0);
    document.getElementById('contingency8').textContent = contingency8.toFixed(0);
    document.getElementById('contingency9').textContent = contingency9.toFixed(0);
    
    document.getElementById('holeVolume1').textContent = holeVolume1.toFixed(0);
    document.getElementById('holeVolume2').textContent = holeVolume2.toFixed(0);
    document.getElementById('holeVolume3').textContent = holeVolume3.toFixed(0);
    document.getElementById('holeVolume4').textContent = holeVolume4.toFixed(0);
    document.getElementById('holeVolume5').textContent = holeVolume5.toFixed(0);
    document.getElementById('holeVolume6').textContent = holeVolume6.toFixed(0);
    document.getElementById('holeVolume7').textContent = holeVolume7.toFixed(0);
    document.getElementById('holeVolume8').textContent = holeVolume8.toFixed(0);
    document.getElementById('holeVolume9').textContent = holeVolume9.toFixed(0);
    
    document.getElementById('totalVolumeRequired1').textContent = totalVolumeRequired1.toFixed(0);
    document.getElementById('totalVolumeRequired2').textContent = totalVolumeRequired2.toFixed(0);
    document.getElementById('totalVolumeRequired3').textContent = totalVolumeRequired3.toFixed(0);
    document.getElementById('totalVolumeRequired4').textContent = totalVolumeRequired4.toFixed(0);
    document.getElementById('totalVolumeRequired5').textContent = totalVolumeRequired5.toFixed(0);
    document.getElementById('totalVolumeRequired6').textContent = totalVolumeRequired6.toFixed(0);
    document.getElementById('totalVolumeRequired7').textContent = totalVolumeRequired7.toFixed(0);
    document.getElementById('totalVolumeRequired8').textContent = totalVolumeRequired8.toFixed(0);
    document.getElementById('totalVolumeRequired9').textContent = totalVolumeRequired9.toFixed(0);
    
    document.getElementById('mudReceived1').textContent = mudReceived1.toFixed(0);
    document.getElementById('mudReceived2').textContent = mudReceived2.toFixed(0);
    document.getElementById('mudReceived3').textContent = mudReceived3.toFixed(0);
    document.getElementById('mudReceived4').textContent = mudReceived4.toFixed(0);
    document.getElementById('mudReceived5').textContent = mudReceived5.toFixed(0);
    document.getElementById('mudReceived6').textContent = mudReceived6.toFixed(0);
    document.getElementById('mudReceived7').textContent = mudReceived7.toFixed(0);
    document.getElementById('mudReceived8').textContent = mudReceived8.toFixed(0);
    document.getElementById('mudReceived9').textContent = mudReceived9.toFixed(0);
    
    document.getElementById('newMud1').textContent = newMud1.toFixed(0);
    document.getElementById('newMud2').textContent = newMud2.toFixed(0);
    document.getElementById('newMud3').textContent = newMud3.toFixed(0);
    document.getElementById('newMud4').textContent = newMud4.toFixed(0);
    document.getElementById('newMud5').textContent = newMud5.toFixed(0);
    document.getElementById('newMud6').textContent = newMud6.toFixed(0);
    document.getElementById('newMud7').textContent = newMud7.toFixed(0);
    document.getElementById('newMud8').textContent = newMud8.toFixed(0);
    document.getElementById('newMud9').textContent = newMud9.toFixed(0);
    
    document.getElementById('mudLeft1').textContent = mudLeft1.toFixed(0);
    document.getElementById('mudLeft2').textContent = mudLeft2.toFixed(0);
    document.getElementById('mudLeft3').textContent = mudLeft3.toFixed(0);
    document.getElementById('mudLeft4').textContent = mudLeft4.toFixed(0);
    document.getElementById('mudLeft5').textContent = mudLeft5.toFixed(0);
    document.getElementById('mudLeft6').textContent = mudLeft6.toFixed(0);
    document.getElementById('mudLeft7').textContent = mudLeft7.toFixed(0);
    document.getElementById('mudLeft8').textContent = mudLeft8.toFixed(0);
    document.getElementById('mudLeft9').textContent = mudLeft9.toFixed(0);
    
    document.getElementById('costPerFootDrilled1').textContent = costPerFootDrilled1.toFixed(2);
    document.getElementById('costPerFootDrilled2').textContent = costPerFootDrilled2.toFixed(2);
    document.getElementById('costPerFootDrilled3').textContent = costPerFootDrilled3.toFixed(2);
    document.getElementById('costPerFootDrilled4').textContent = costPerFootDrilled4.toFixed(2);
    document.getElementById('costPerFootDrilled5').textContent = costPerFootDrilled5.toFixed(2);
    document.getElementById('costPerFootDrilled6').textContent = costPerFootDrilled6.toFixed(2);
    document.getElementById('costPerFootDrilled7').textContent = costPerFootDrilled7.toFixed(2);
    document.getElementById('costPerFootDrilled8').textContent = costPerFootDrilled8.toFixed(2);
    document.getElementById('costPerFootDrilled9').textContent = costPerFootDrilled9.toFixed(2);
    
    document.getElementById('dilutionLosses10').textContent = dilutionLosses10.toFixed(0);
    document.getElementById('dilutionLosses11').textContent = dilutionLosses11.toFixed(0);
    document.getElementById('dilutionLosses12').textContent = dilutionLosses12.toFixed(0);
    document.getElementById('dilutionLosses13').textContent = dilutionLosses13.toFixed(0);
    document.getElementById('dilutionLosses14').textContent = dilutionLosses14.toFixed(0);
    
    document.getElementById('contingency10').textContent = contingency10.toFixed(0);
    document.getElementById('contingency11').textContent = contingency11.toFixed(0);
    document.getElementById('contingency12').textContent = contingency12.toFixed(0);
    document.getElementById('contingency13').textContent = contingency13.toFixed(0);
    document.getElementById('contingency14').textContent = contingency14.toFixed(0);
    
    document.getElementById('totalVolumeRequired10').textContent = totalVolumeRequired10.toFixed(0);
    document.getElementById('totalVolumeRequired11').textContent = totalVolumeRequired11.toFixed(0);
    document.getElementById('totalVolumeRequired12').textContent = totalVolumeRequired12.toFixed(0);
    document.getElementById('totalVolumeRequired13').textContent = totalVolumeRequired13.toFixed(0);
    document.getElementById('totalVolumeRequired14').textContent = totalVolumeRequired14.toFixed(0);
    
    document.getElementById('costPerFoot1').textContent = costPerFoot1.toFixed(2);
    document.getElementById('costPerFoot2').textContent = costPerFoot2.toFixed(2);
    document.getElementById('costPerFoot3').textContent = costPerFoot3.toFixed(2);
    document.getElementById('costPerFoot4').textContent = costPerFoot4.toFixed(2);
    document.getElementById('costPerFoot5').textContent = costPerFoot5.toFixed(2);
    
    sessionStorage.setItem('costPerFootDrilledValue1', costPerFootDrilled1);
    sessionStorage.setItem('costPerFootDrilledValue2', costPerFootDrilled2);
    sessionStorage.setItem('costPerFootDrilledValue3', costPerFootDrilled3);
    sessionStorage.setItem('costPerFootDrilledValue4', costPerFootDrilled4);
    sessionStorage.setItem('costPerFootDrilledValue5', costPerFootDrilled5);
    sessionStorage.setItem('costPerFootDrilledValue6', costPerFootDrilled6);
    sessionStorage.setItem('costPerFootDrilledValue7', costPerFootDrilled7);
    sessionStorage.setItem('costPerFootDrilledValue8', costPerFootDrilled8);
    sessionStorage.setItem('costPerFootDrilledValue9', costPerFootDrilled9);
}

function calculate3(){
    var waterDepth10 = parseFloat(document.getElementById('waterDepth10').value);
    var waterDepth11 = parseFloat(document.getElementById('waterDepth11').value);
    var waterDepth12 = parseFloat(document.getElementById('waterDepth12').value);
    var waterDepth13 = parseFloat(document.getElementById('waterDepth13').value);
    var waterDepth14 = parseFloat(document.getElementById('waterDepth14').value);
    var waterDepth15 = parseFloat(document.getElementById('waterDepth15').value);
    var waterDepth16 = parseFloat(document.getElementById('waterDepth16').value);
    var waterDepth17 = parseFloat(document.getElementById('waterDepth17').value);
    var waterDepth18 = parseFloat(document.getElementById('waterDepth18').value);
    
    var holeSize10 = parseFloat(document.getElementById('holeSize10').value);
    var holeSize11 = parseFloat(document.getElementById('holeSize11').value);
    var holeSize12 = parseFloat(document.getElementById('holeSize12').value);
    var holeSize13 = parseFloat(document.getElementById('holeSize13').value);
    var holeSize14 = parseFloat(document.getElementById('holeSize14').value);
    var holeSize15 = parseFloat(document.getElementById('holeSize15').value);
    var holeSize16 = parseFloat(document.getElementById('holeSize16').value);
    var holeSize17 = parseFloat(document.getElementById('holeSize17').value);
    var holeSize18 = parseFloat(document.getElementById('holeSize18').value);
    
    var MudWeight10 = parseFloat(document.getElementById('MudWeight10').value);
    var MudWeight11 = parseFloat(document.getElementById('MudWeight11').value);
    var MudWeight12 = parseFloat(document.getElementById('MudWeight12').value);
    var MudWeight13 = parseFloat(document.getElementById('MudWeight13').value);
    var MudWeight14 = parseFloat(document.getElementById('MudWeight14').value);
    var MudWeight15 = parseFloat(document.getElementById('MudWeight15').value);
    var MudWeight16 = parseFloat(document.getElementById('MudWeight16').value);
    var MudWeight17 = parseFloat(document.getElementById('MudWeight17').value);
    var MudWeight18 = parseFloat(document.getElementById('MudWeight18').value);
    
    var DilutionFactor1 = parseFloat(document.getElementById('DilutionFactor1').value);
    var DilutionFactor2 = parseFloat(document.getElementById('DilutionFactor2').value);
    var DilutionFactor3 = parseFloat(document.getElementById('DilutionFactor3').value);
    var DilutionFactor4 = parseFloat(document.getElementById('DilutionFactor4').value);
    var DilutionFactor5 = parseFloat(document.getElementById('DilutionFactor5').value);
    var DilutionFactor6 = parseFloat(document.getElementById('DilutionFactor6').value);
    var DilutionFactor7 = parseFloat(document.getElementById('DilutionFactor7').value);
    var DilutionFactor8 = parseFloat(document.getElementById('DilutionFactor8').value);
    var DilutionFactor9 = parseFloat(document.getElementById('DilutionFactor9').value);
    
    var footageDrilled10 = parseFloat(document.getElementById('footageDrilled10').value);
    var footageDrilled11 = parseFloat(document.getElementById('footageDrilled11').value);
    var footageDrilled12 = parseFloat(document.getElementById('footageDrilled12').value);
    var footageDrilled13 = parseFloat(document.getElementById('footageDrilled13').value);
    var footageDrilled14 = parseFloat(document.getElementById('footageDrilled14').value);
    var footageDrilled15 = parseFloat(document.getElementById('footageDrilled15').value);
    var footageDrilled16 = parseFloat(document.getElementById('footageDrilled16').value);
    var footageDrilled17 = parseFloat(document.getElementById('footageDrilled17').value);
    var footageDrilled18 = parseFloat(document.getElementById('footageDrilled18').value);
    
    var wellCleanUp2 = parseFloat(document.getElementById('wellCleanUp2').value);
    
    var BrineWeight6 = parseFloat(document.getElementById('BrineWeight6').value);
    var BrineWeight7 = parseFloat(document.getElementById('BrineWeight7').value);
    var BrineWeight8 = parseFloat(document.getElementById('BrineWeight8').value);
    var BrineWeight9 = parseFloat(document.getElementById('BrineWeight9').value);
    var BrineWeight10 = parseFloat(document.getElementById('BrineWeight10').value);
    
    var SectionFootage6 = parseFloat(document.getElementById('SectionFootage6').value);
    var SectionFootage7 = parseFloat(document.getElementById('SectionFootage7').value);
    var SectionFootage8 = parseFloat(document.getElementById('SectionFootage8').value);
    var SectionFootage9 = parseFloat(document.getElementById('SectionFootage9').value);
    var SectionFootage10 = parseFloat(document.getElementById('SectionFootage10').value);
    
    var CasingVolume6 = parseFloat(document.getElementById('CasingVolume6').value);
    var CasingVolume7 = parseFloat(document.getElementById('CasingVolume7').value);
    var CasingVolume8 = parseFloat(document.getElementById('CasingVolume8').value);
    var CasingVolume9 = parseFloat(document.getElementById('CasingVolume9').value);
    var CasingVolume10 = parseFloat(document.getElementById('CasingVolume10').value);
    
    var DilutionFactor10 = parseFloat(document.getElementById('DilutionFactor10').value);
    var DilutionFactor11 = parseFloat(document.getElementById('DilutionFactor11').value);
    var DilutionFactor12 = parseFloat(document.getElementById('DilutionFactor12').value);
    var DilutionFactor13 = parseFloat(document.getElementById('DilutionFactor13').value);
    var DilutionFactor14 = parseFloat(document.getElementById('DilutionFactor14').value);
    
    // Session Storage
    sessionStorage.setItem('waterDepthValue10', waterDepth10);
    sessionStorage.setItem('waterDepthValue11', waterDepth11);
    sessionStorage.setItem('waterDepthValue12', waterDepth12);
    sessionStorage.setItem('waterDepthValue13', waterDepth13);
    sessionStorage.setItem('waterDepthValue14', waterDepth14);
    sessionStorage.setItem('waterDepthValue15', waterDepth15);
    sessionStorage.setItem('waterDepthValue16', waterDepth16);
    sessionStorage.setItem('waterDepthValue17', waterDepth17);
    sessionStorage.setItem('waterDepthValue18', waterDepth18);
    
    sessionStorage.setItem('holeSizeValue10', holeSize10);
    sessionStorage.setItem('holeSizeValue11', holeSize11);
    sessionStorage.setItem('holeSizeValue12', holeSize12);
    sessionStorage.setItem('holeSizeValue13', holeSize13);
    sessionStorage.setItem('holeSizeValue14', holeSize14);
    sessionStorage.setItem('holeSizeValue15', holeSize15);
    sessionStorage.setItem('holeSizeValue16', holeSize16);
    sessionStorage.setItem('holeSizeValue17', holeSize17);
    sessionStorage.setItem('holeSizeValue18', holeSize18);
    
    sessionStorage.setItem('MudWeightValue10', MudWeight10);
    sessionStorage.setItem('MudWeightValue11', MudWeight11);
    sessionStorage.setItem('MudWeightValue12', MudWeight12);
    sessionStorage.setItem('MudWeightValue13', MudWeight13);
    sessionStorage.setItem('MudWeightValue14', MudWeight14);
    sessionStorage.setItem('MudWeightValue15', MudWeight15);
    sessionStorage.setItem('MudWeightValue16', MudWeight16);
    sessionStorage.setItem('MudWeightValue17', MudWeight17);
    sessionStorage.setItem('MudWeightValue18', MudWeight18);
    
    sessionStorage.setItem('DilutionFactorValue1', DilutionFactor1);
    sessionStorage.setItem('DilutionFactorValue2', DilutionFactor2); 
    sessionStorage.setItem('DilutionFactorValue3', DilutionFactor3); 
    sessionStorage.setItem('DilutionFactorValue4', DilutionFactor4); 
    sessionStorage.setItem('DilutionFactorValue5', DilutionFactor5); 
    sessionStorage.setItem('DilutionFactorValue6', DilutionFactor6); 
    sessionStorage.setItem('DilutionFactorValue7', DilutionFactor7); 
    sessionStorage.setItem('DilutionFactorValue8', DilutionFactor8); 
    sessionStorage.setItem('DilutionFactorValue9', DilutionFactor9); 
    
    sessionStorage.setItem('footageDrilledValue10', footageDrilled10); 
    sessionStorage.setItem('footageDrilledValue11', footageDrilled11); 
    sessionStorage.setItem('footageDrilledValue12', footageDrilled12); 
    sessionStorage.setItem('footageDrilledValue13', footageDrilled13); 
    sessionStorage.setItem('footageDrilledValue14', footageDrilled14); 
    sessionStorage.setItem('footageDrilledValue15', footageDrilled15); 
    sessionStorage.setItem('footageDrilledValue16', footageDrilled16); 
    sessionStorage.setItem('footageDrilledValue17', footageDrilled17); 
    sessionStorage.setItem('footageDrilledValue18', footageDrilled18); 
    
    sessionStorage.setItem('wellCleanUpValue2', wellCleanUp2);
    
    sessionStorage.setItem('BrineWeightValue6', BrineWeight6); 
    sessionStorage.setItem('BrineWeightValue7', BrineWeight7); 
    sessionStorage.setItem('BrineWeightValue8', BrineWeight8); 
    sessionStorage.setItem('BrineWeightValue9', BrineWeight9); 
    sessionStorage.setItem('BrineWeightValue10', BrineWeight10); 
    
    sessionStorage.setItem('SectionFootageValue6', SectionFootage6);
    sessionStorage.setItem('SectionFootageValue7', SectionFootage7);
    sessionStorage.setItem('SectionFootageValue8', SectionFootage8);
    sessionStorage.setItem('SectionFootageValue9', SectionFootage9);
    sessionStorage.setItem('SectionFootageValue10', SectionFootage10);
    
    sessionStorage.setItem('CasingVolumeValue6', CasingVolume6);
    sessionStorage.setItem('CasingVolumeValue7', CasingVolume7);
    sessionStorage.setItem('CasingVolumeValue8', CasingVolume8);
    sessionStorage.setItem('CasingVolumeValue9', CasingVolume9);
    sessionStorage.setItem('CasingVolumeValue10', CasingVolume10);
    
    sessionStorage.setItem('DilutionFactorValue10', DilutionFactor10);
    sessionStorage.setItem('DilutionFactorValue11', DilutionFactor11);
    sessionStorage.setItem('DilutionFactorValue12', DilutionFactor12);
    sessionStorage.setItem('DilutionFactorValue13', DilutionFactor13);
    sessionStorage.setItem('DilutionFactorValue14', DilutionFactor14);
    
    
    // Calculaion
    var costPerFootDrilled10 = parseFloat(sessionStorage.getItem('costPerFootDrilledValue10')) || 0;
    var costPerFootDrilled11 = parseFloat(sessionStorage.getItem('costPerFootDrilledValue11')) || 0;
    var costPerFootDrilled12 = parseFloat(sessionStorage.getItem('costPerFootDrilledValue12')) || 0;
    var costPerFootDrilled13 = parseFloat(sessionStorage.getItem('costPerFootDrilledValue13')) || 0;
    var costPerFootDrilled14 = parseFloat(sessionStorage.getItem('costPerFootDrilledValue14')) || 0;
    var costPerFootDrilled15 = parseFloat(sessionStorage.getItem('costPerFootDrilledValue15')) || 0;
    var costPerFootDrilled16 = parseFloat(sessionStorage.getItem('costPerFootDrilledValue16')) || 0;
    var costPerFootDrilled17 = parseFloat(sessionStorage.getItem('costPerFootDrilledValue17')) || 0;
    var costPerFootDrilled18 = parseFloat(sessionStorage.getItem('costPerFootDrilledValue18')) || 0;
    
    var totalCostPerSection15 = (costPerFootDrilled10 * footageDrilled10) * ( 1 + DilutionFactor1);
    var totalCostPerSection16 = (costPerFootDrilled11 * footageDrilled11) * ( 1 + DilutionFactor2);
    var totalCostPerSection17 = (costPerFootDrilled12 * footageDrilled12) * ( 1 + DilutionFactor3);
    var totalCostPerSection18 = (costPerFootDrilled13 * footageDrilled13) * ( 1 + DilutionFactor4);
    var totalCostPerSection19 = (costPerFootDrilled14 * footageDrilled14) * ( 1 + DilutionFactor5);
    var totalCostPerSection20 = (costPerFootDrilled15 * footageDrilled15) * ( 1 + DilutionFactor6);
    var totalCostPerSection21 = (costPerFootDrilled16 * footageDrilled16) * ( 1 + DilutionFactor7);
    var totalCostPerSection22 = (costPerFootDrilled17 * footageDrilled17) * ( 1 + DilutionFactor8);
    var totalCostPerSection23 = (costPerFootDrilled18 * footageDrilled18) * ( 1 + DilutionFactor9);

    var totalDrillingFuildsCost2 = totalCostPerSection15 + totalCostPerSection16 + totalCostPerSection17 + totalCostPerSection18 + totalCostPerSection19 + totalCostPerSection20 + totalCostPerSection21 + totalCostPerSection22 + totalCostPerSection23;
    
    // Completion Parameters
    var dl1 = 0.35 * SectionFootage6;
    var dl2 = 0.35 * SectionFootage7;
    var dl3 = 0.35 * SectionFootage8;
    var dl4 = 0.35 * SectionFootage9;
    var dl5 = 0.35 * SectionFootage10;
    
    var sv1 = 800;
    var sv2 = 800;
    var sv3 = 800;
    var sv4 = 800;
    var sv5 = 800;
    
    var con1 = (SectionFootage6 + sv1 + CasingVolume6) * 0.2;
    var con2 = (SectionFootage7 + sv2 + CasingVolume7) * 0.2;
    var con3 = (SectionFootage8 + sv3 + CasingVolume8) * 0.2;
    var con4 = (SectionFootage9 + sv4 + CasingVolume9) * 0.2;
    var con5 = (SectionFootage10 + sv5 + CasingVolume10) * 0.2;
    
    var tvr1 = SectionFootage6 + sv1 + CasingVolume6 + dl1 + con1;
    var tvr2 = SectionFootage7 + sv2 + CasingVolume7 + dl2 + con2;
    var tvr3 = SectionFootage8 + sv3 + CasingVolume8 + dl3 + con3;
    var tvr4 = SectionFootage9 + sv4 + CasingVolume9 + dl4 + con4;
    var tvr5 = SectionFootage10 + sv5 + CasingVolume10 + dl5 + con5;
    
    var cpb1 = parseFloat(sessionStorage.getItem('costPerBarrelValue15'));
    var cpb2 = parseFloat(sessionStorage.getItem('costPerBarrelValue16'));
    var cpb3 = parseFloat(sessionStorage.getItem('costPerBarrelValue17'));
    var cpb4 = parseFloat(sessionStorage.getItem('costPerBarrelValue18'));
    var cpb5 = parseFloat(sessionStorage.getItem('costPerBarrelValue19'));
    
    var costPerFoot6 = cpb1 * (tvr1 / SectionFootage6);
    var costPerFoot7 = cpb2 * (tvr2 / SectionFootage6);
    var costPerFoot8 = cpb3 * (tvr3 / SectionFootage6);
    var costPerFoot9 = cpb4 * (tvr4 / SectionFootage6);
    var costPerFoot10 = cpb5 * (tvr5 / SectionFootage6);
    
    var totalCostPerSection24 = (costPerFoot6 * SectionFootage6) * (1 + DilutionFactor10);
    var totalCostPerSection25 = (costPerFoot7 * SectionFootage6) * (1 + DilutionFactor10);
    var totalCostPerSection26 = (costPerFoot8 * SectionFootage6) * (1 + DilutionFactor10);
    var totalCostPerSection27 = (costPerFoot9 * SectionFootage6) * (1 + DilutionFactor10);
    var totalCostPerSection28 = (costPerFoot10 * SectionFootage6) * (1 + DilutionFactor10);
    
    var totalCompletionFluidsCost2 = totalCostPerSection24 + totalCostPerSection25 + totalCostPerSection26 + totalCostPerSection27 + totalCostPerSection28;
    
    var totalWellCostOnFluids2 = totalCompletionFluidsCost2 + totalDrillingFuildsCost2 + wellCleanUp2;
    
    document.getElementById('totalCostPerSection15').textContent = totalCostPerSection15.toFixed(2);
    document.getElementById('totalCostPerSection16').textContent = totalCostPerSection16.toFixed(2);
    document.getElementById('totalCostPerSection17').textContent = totalCostPerSection17.toFixed(2);
    document.getElementById('totalCostPerSection18').textContent = totalCostPerSection18.toFixed(2);
    document.getElementById('totalCostPerSection19').textContent = totalCostPerSection19.toFixed(2);
    document.getElementById('totalCostPerSection20').textContent = totalCostPerSection20.toFixed(2);
    document.getElementById('totalCostPerSection21').textContent = totalCostPerSection21.toFixed(2);
    document.getElementById('totalCostPerSection22').textContent = totalCostPerSection22.toFixed(2);
    document.getElementById('totalCostPerSection23').textContent = totalCostPerSection23.toFixed(2);
    
    document.getElementById('costPerFootDrilled10').textContent = costPerFootDrilled10.toFixed(2);
    document.getElementById('costPerFootDrilled11').textContent = costPerFootDrilled11.toFixed(2);
    document.getElementById('costPerFootDrilled12').textContent = costPerFootDrilled12.toFixed(2);
    document.getElementById('costPerFootDrilled13').textContent = costPerFootDrilled13.toFixed(2);
    document.getElementById('costPerFootDrilled14').textContent = costPerFootDrilled14.toFixed(2);
    document.getElementById('costPerFootDrilled15').textContent = costPerFootDrilled15.toFixed(2);
    document.getElementById('costPerFootDrilled16').textContent = costPerFootDrilled16.toFixed(2);
    document.getElementById('costPerFootDrilled17').textContent = costPerFootDrilled17.toFixed(2);
    document.getElementById('costPerFootDrilled18').textContent = costPerFootDrilled18.toFixed(2);
    
    document.getElementById('totalDrillingFuildsCost2').textContent = totalDrillingFuildsCost2.toFixed(2);
    
    document.getElementById('costPerFoot6').textContent = costPerFoot6.toFixed(2);
    document.getElementById('costPerFoot7').textContent = costPerFoot7.toFixed(2);
    document.getElementById('costPerFoot8').textContent = costPerFoot8.toFixed(2);
    document.getElementById('costPerFoot9').textContent = costPerFoot9.toFixed(2);
    document.getElementById('costPerFoot10').textContent = costPerFoot10.toFixed(2);
    
    document.getElementById('totalCostPerSection24').textContent = totalCostPerSection24.toFixed(2);
    document.getElementById('totalCostPerSection25').textContent = totalCostPerSection25.toFixed(2);
    document.getElementById('totalCostPerSection26').textContent = totalCostPerSection26.toFixed(2);
    document.getElementById('totalCostPerSection27').textContent = totalCostPerSection27.toFixed(2);
    document.getElementById('totalCostPerSection28').textContent = totalCostPerSection28.toFixed(2);
    
    document.getElementById('totalCompletionFluidsCost2').textContent = totalCompletionFluidsCost2.toFixed(2);
    
    document.getElementById('totalWellCostOnFluids2').textContent = totalWellCostOnFluids2.toFixed(2);
}

function calculate4(){
    // Collect Input Value
    var to10 = parseFloat(document.getElementById('to10').value);
    var to11 = parseFloat(document.getElementById('to11').value);
    var to12 = parseFloat(document.getElementById('to12').value);
    var to13 = parseFloat(document.getElementById('to13').value);
    var to14 = parseFloat(document.getElementById('to14').value);
    var to15 = parseFloat(document.getElementById('to15').value);
    var to16 = parseFloat(document.getElementById('to16').value);
    var to17 = parseFloat(document.getElementById('to17').value);
    var to18 = parseFloat(document.getElementById('to18').value);
    
    var prCasingFrom10 = parseFloat(document.getElementById('prCasingFrom10').value);
    var prCasingFrom11 = parseFloat(document.getElementById('prCasingFrom11').value);
    var prCasingFrom12 = parseFloat(document.getElementById('prCasingFrom12').value);
    var prCasingFrom13 = parseFloat(document.getElementById('prCasingFrom13').value);
    var prCasingFrom14 = parseFloat(document.getElementById('prCasingFrom14').value);
    var prCasingFrom15 = parseFloat(document.getElementById('prCasingFrom15').value);
    var prCasingFrom16 = parseFloat(document.getElementById('prCasingFrom16').value);
    var prCasingFrom17 = parseFloat(document.getElementById('prCasingFrom17').value);
    var prCasingFrom18 = parseFloat(document.getElementById('prCasingFrom18').value);
    
    var prCasingTo10 = parseFloat(document.getElementById('prCasingTo10').value);
    var prCasingTo11 = parseFloat(document.getElementById('prCasingTo11').value);
    var prCasingTo12 = parseFloat(document.getElementById('prCasingTo12').value);
    var prCasingTo13 = parseFloat(document.getElementById('prCasingTo13').value);
    var prCasingTo14 = parseFloat(document.getElementById('prCasingTo14').value);
    var prCasingTo15 = parseFloat(document.getElementById('prCasingTo15').value);
    var prCasingTo16 = parseFloat(document.getElementById('prCasingTo16').value);
    var prCasingTo17 = parseFloat(document.getElementById('prCasingTo17').value);
    var prCasingTo18 = parseFloat(document.getElementById('prCasingTo18').value);
    
    var prCasingId10 = parseFloat(document.getElementById('prCasingId10').value);
    var prCasingId11 = parseFloat(document.getElementById('prCasingId11').value);
    var prCasingId12 = parseFloat(document.getElementById('prCasingId12').value);
    var prCasingId13 = parseFloat(document.getElementById('prCasingId13').value);
    var prCasingId14 = parseFloat(document.getElementById('prCasingId14').value);
    var prCasingId15 = parseFloat(document.getElementById('prCasingId15').value);
    var prCasingId16 = parseFloat(document.getElementById('prCasingId16').value);
    var prCasingId17 = parseFloat(document.getElementById('prCasingId17').value);
    var prCasingId18 = parseFloat(document.getElementById('prCasingId18').value);
    
    
    // Save it to Session Storage
    sessionStorage.setItem('toValue10', to10);
    sessionStorage.setItem('toValue11', to11);
    sessionStorage.setItem('toValue12', to12);
    sessionStorage.setItem('toValue13', to13);
    sessionStorage.setItem('toValue14', to14);
    sessionStorage.setItem('toValue15', to15);
    sessionStorage.setItem('toValue16', to16);
    sessionStorage.setItem('toValue17', to17);
    sessionStorage.setItem('toValue18', to18);
    
    sessionStorage.setItem('prCasingFromValue10', prCasingFrom10);
    sessionStorage.setItem('prCasingFromValue11', prCasingFrom11);
    sessionStorage.setItem('prCasingFromValue12', prCasingFrom12);
    sessionStorage.setItem('prCasingFromValue13', prCasingFrom13);
    sessionStorage.setItem('prCasingFromValue14', prCasingFrom14);
    sessionStorage.setItem('prCasingFromValue15', prCasingFrom15);
    sessionStorage.setItem('prCasingFromValue16', prCasingFrom16);
    sessionStorage.setItem('prCasingFromValue17', prCasingFrom17);
    sessionStorage.setItem('prCasingFromValue18', prCasingFrom18);
    
    sessionStorage.setItem('prCasingToValue10', prCasingTo10);
    sessionStorage.setItem('prCasingToValue11', prCasingTo11);
    sessionStorage.setItem('prCasingToValue12', prCasingTo12);
    sessionStorage.setItem('prCasingToValue13', prCasingTo13);
    sessionStorage.setItem('prCasingToValue14', prCasingTo14);
    sessionStorage.setItem('prCasingToValue15', prCasingTo15);
    sessionStorage.setItem('prCasingToValue16', prCasingTo16);
    sessionStorage.setItem('prCasingToValue17', prCasingTo17);
    sessionStorage.setItem('prCasingToValue18', prCasingTo18);
    
    sessionStorage.setItem('prCasingIdValue10', prCasingId10);
    sessionStorage.setItem('prCasingIdValue11', prCasingId11);
    sessionStorage.setItem('prCasingIdValue12', prCasingId12);
    sessionStorage.setItem('prCasingIdValue13', prCasingId13);
    sessionStorage.setItem('prCasingIdValue14', prCasingId14);
    sessionStorage.setItem('prCasingIdValue15', prCasingId15);
    sessionStorage.setItem('prCasingIdValue16', prCasingId16);
    sessionStorage.setItem('prCasingIdValue17', prCasingId17);
    sessionStorage.setItem('prCasingIdValue18', prCasingId18);
    
    // Calculation
    var casingVolume15 = ((prCasingTo10 - prCasingFrom10) * prCasingId10 * prCasingId10) / 1029;
    var casingVolume16 = ((prCasingTo11 - prCasingFrom11) * prCasingId11 * prCasingId11) / 1029;
    var casingVolume17 = ((prCasingTo12 - prCasingFrom12) * prCasingId12 * prCasingId12) / 1029 + ((prCasingFrom12 * prCasingId11 * prCasingId11)/1029);
    var casingVolume18 = ((prCasingTo13 - prCasingFrom13) * prCasingId13 * prCasingId13) / 1029 + ((prCasingFrom13 * prCasingId12 * prCasingId12)/1029);
    var casingVolume19 = ((prCasingTo14 - prCasingFrom14) * prCasingId14 * prCasingId14) / 1029 + ((prCasingFrom14 * prCasingId13 * prCasingId13)/1029);
    var casingVolume20 = ((prCasingTo15 - prCasingFrom15) * prCasingId15 * prCasingId15) / 1029 + ((prCasingFrom15 * prCasingId14 * prCasingId14)/1029);
    var casingVolume21 = ((prCasingTo16 - prCasingFrom16) * prCasingId16 * prCasingId16) / 1029 + ((prCasingFrom16 * prCasingId15 * prCasingId15)/1029);
    var casingVolume22 = ((prCasingTo17 - prCasingFrom17) * prCasingId17 * prCasingId17) / 1029 + ((prCasingFrom17 * prCasingId16 * prCasingId16)/1029);
    var casingVolume23 = ((prCasingTo18 - prCasingFrom18) * prCasingId18 * prCasingId18) / 1029 + ((prCasingFrom18 * prCasingId17 * prCasingId17)/1029);
    
    var openHoleVolume10 = (footageDrilled10 * size10 * size10) / 1029;
    var openHoleVolume11 = (footageDrilled11 * size11 * size11) / 1029;
    var openHoleVolume12 = ((footageDrilled12 * size12 * size12) / 1029) * 2;
    var openHoleVolume13 = ((footageDrilled13 * size13 * size13) / 1029) * 3;
    var openHoleVolume14 = ((footageDrilled14 * size14 * size14) / 1029) * 4;
    var openHoleVolume15 = ((footageDrilled15 * size15 * size15) / 1029) * 5;
    var openHoleVolume16 = ((footageDrilled16 * size16 * size16) / 1029) * 2;
    var openHoleVolume17 = ((footageDrilled17 * size17 * size17) / 1029) * 3;
    var openHoleVolume18 = ((footageDrilled18 * size18 * size18) / 1029) * 4;
    
    var dilutionLosses15 = 0.35 * footageDrilled10;
    var dilutionLosses16 = 0.35 * footageDrilled11;
    var dilutionLosses17 = 0.35 * footageDrilled12;
    var dilutionLosses18 = 0.35 * footageDrilled13;
    var dilutionLosses19 = 0.35 * footageDrilled14;
    var dilutionLosses20 = 0.35 * footageDrilled15;
    var dilutionLosses21 = 0.35 * footageDrilled16;
    var dilutionLosses22 = 0.35 * footageDrilled17;
    var dilutionLosses23 = 0.35 * footageDrilled18;
    
    var contingency15 = (400 + casingVolume15 + openHoleVolume10) * 0.2;
    var contingency16 = (400 + casingVolume16 + openHoleVolume11) * 0.2;
    var contingency17 = (800 + casingVolume17 + openHoleVolume12) * 0.2;
    var contingency18 = (800 + casingVolume18 + openHoleVolume13) * 0.2;
    var contingency19 = (800 + casingVolume19 + openHoleVolume14) * 0.2;
    var contingency20 = (800 + casingVolume20 + openHoleVolume15) * 0.2;
    var contingency21 = (800 + casingVolume21 + openHoleVolume16) * 0.2;
    var contingency22 = (800 + casingVolume22 + openHoleVolume17) * 0.2;
    var contingency23 = (800 + casingVolume23 + openHoleVolume18) * 0.2;
    
    var holeVolume10 = casingVolume15 + openHoleVolume10;
    var holeVolume11 = casingVolume16 + openHoleVolume11;
    var holeVolume12 = casingVolume17 + openHoleVolume12;
    var holeVolume13 = casingVolume18 + openHoleVolume13;
    var holeVolume14 = casingVolume19 + openHoleVolume14;
    var holeVolume15 = casingVolume20 + openHoleVolume15;
    var holeVolume16 = casingVolume21 + openHoleVolume16;
    var holeVolume17 = casingVolume22 + openHoleVolume17;
    var holeVolume18 = casingVolume23 + openHoleVolume18;
    
    var totalVolumeRequired15 = 400 + casingVolume15 + openHoleVolume10 + dilutionLosses15 + contingency15;
    var totalVolumeRequired16 = ((800 + openHoleVolume11)+((footageDrilled16 / 100) * 1429)) * 0.4;
    var totalVolumeRequired17 = 800 + casingVolume17 + openHoleVolume12 + dilutionLosses17 + contingency17;
    var totalVolumeRequired18 = 800 + casingVolume18 + openHoleVolume13 + dilutionLosses18 + contingency18;
    var totalVolumeRequired19 = 800 + casingVolume19 + openHoleVolume14 + dilutionLosses19 + contingency19;
    var totalVolumeRequired20 = 800 + casingVolume20 + openHoleVolume15 + dilutionLosses20 + contingency20;
    var totalVolumeRequired21 = 800 + casingVolume21 + openHoleVolume16 + dilutionLosses21 + contingency21;
    var totalVolumeRequired22 = 800 + casingVolume22 + openHoleVolume17 + dilutionLosses22 + contingency22;
    var totalVolumeRequired23 = 800 + casingVolume23 + openHoleVolume18 + dilutionLosses23 + contingency23;
    
    var mudLeft10 = totalVolumeRequired15 - dilutionLosses15 - contingency15;
    var mudLeft11 = totalVolumeRequired16 - 0 - 0;
    var mudLeft12 = totalVolumeRequired17 - dilutionLosses17 - contingency17;
    var mudLeft13 = totalVolumeRequired18 - dilutionLosses18 - contingency18;
    var mudLeft14 = totalVolumeRequired19 - dilutionLosses19 - contingency19;
    var mudLeft15 = totalVolumeRequired20 - dilutionLosses20 - contingency20;
    var mudLeft16 = totalVolumeRequired21 - dilutionLosses21 - contingency21;
    var mudLeft17 = totalVolumeRequired22 - dilutionLosses22 - contingency22;
    var mudLeft18 = totalVolumeRequired23 - dilutionLosses23 - contingency23;
    
    var mudReceived10 = 0;
    var mudReceived11 = 0;
    var mudReceived12 = 0;
    var mudReceived13 = mudLeft12;
    var mudReceived14 = mudLeft13;
    var mudReceived15 = mudLeft14;
    var mudReceived16 = 0;
    var mudReceived17 = 0;
    var mudReceived18 = mudLeft16;
    var mudReceived19 = mudLeft17;
    
    var newMud10 = totalVolumeRequired15 - mudReceived10;
    var newMud11 = totalVolumeRequired16 - mudReceived11;
    var newMud12 = totalVolumeRequired17 - mudReceived12;
    var newMud13 = totalVolumeRequired18 - mudReceived13;
    var newMud14 = totalVolumeRequired19 - mudReceived14;
    var newMud15 = totalVolumeRequired20 - mudReceived15;
    var newMud16 = totalVolumeRequired21 - mudReceived16;
    var newMud17 = totalVolumeRequired22 - mudLeft16;
    var newMud18 = totalVolumeRequired23 - mudLeft17;
   
    var costPerFootDrilled10 = costPerBarrel5 * (newMud10 / footageDrilled10);
    var costPerFootDrilled11 = costPerBarrel6 * (newMud11 / footageDrilled11);
    var costPerFootDrilled12 = costPerBarrel7 * (newMud12 / footageDrilled12);
    var costPerFootDrilled13 = costPerBarrel8 * (newMud13 / footageDrilled13);
    var costPerFootDrilled14 = costPerBarrel9 * (newMud14 / footageDrilled14);
    var costPerFootDrilled15 = costPerBarre20 * (newMud15 / footageDrilled15);
    var costPerFootDrilled16 = costPerBarre21 * (newMud16 / footageDrilled16);
    var costPerFootDrilled17 = costPerBarre22 * (newMud17 / footageDrilled17);
    var costPerFootDrilled18 = costPerBarre23 * (newMud18 / footageDrilled18);
    
    sessionStorage.setItem('costPerFootDrilledValue10', costPerFootDrilled10);
    sessionStorage.setItem('costPerFootDrilledValue11', costPerFootDrilled11);
    sessionStorage.setItem('costPerFootDrilledValue12', costPerFootDrilled12);
    sessionStorage.setItem('costPerFootDrilledValue13', costPerFootDrilled13);
    sessionStorage.setItem('costPerFootDrilledValue14', costPerFootDrilled14);
    sessionStorage.setItem('costPerFootDrilledValue15', costPerFootDrilled15);
    sessionStorage.setItem('costPerFootDrilledValue16', costPerFootDrilled16);
    sessionStorage.setItem('costPerFootDrilledValue17', costPerFootDrilled17);
    sessionStorage.setItem('costPerFootDrilledValue18', costPerFootDrilled18);
    
    // Completion parameters
    var totalFootage6 = parseFloat(sessionStorage.getItem('SectionFootageValue6'));
    var totalFootage7 = parseFloat(sessionStorage.getItem('SectionFootageValue7'));
    var totalFootage8 = parseFloat(sessionStorage.getItem('SectionFootageValue8'));
    var totalFootage9 = parseFloat(sessionStorage.getItem('SectionFootageValue9'));
    var totalFootage10 = parseFloat(sessionStorage.getItem('SectionFootageValue10'));

    var costPerBarrel15 = parseFloat(sessionStorage.getItem('costPerBarrelValue15'));
    var costPerBarrel16 = parseFloat(sessionStorage.getItem('costPerBarrelValue16'));
    var costPerBarrel17 = parseFloat(sessionStorage.getItem('costPerBarrelValue17'));
    var costPerBarrel18 = parseFloat(sessionStorage.getItem('costPerBarrelValue18'));
    var costPerBarrel19 = parseFloat(sessionStorage.getItem('costPerBarrelValue19'));

    var CasingVolume24 = parseFloat(sessionStorage.getItem('CasingVolumeValue6'));
    var CasingVolume25 = parseFloat(sessionStorage.getItem('CasingVolumeValue7'));
    var CasingVolume26 = parseFloat(sessionStorage.getItem('CasingVolumeValue8'));
    var CasingVolume27 = parseFloat(sessionStorage.getItem('CasingVolumeValue9'));
    var CasingVolume28 = parseFloat(sessionStorage.getItem('CasingVolumeValue10'));
        
    var surfaceVolume24 = 800;
    var surfaceVolume25 = 800;
    var surfaceVolume26 = 800;
    var surfaceVolume27 = 800;
    var surfaceVolume28 = 800;    
    
    var dilutionLosses24 = 0.35 * totalFootage6;
    var dilutionLosses25 = 0.35 * totalFootage7;
    var dilutionLosses26 = 0.35 * totalFootage8;
    var dilutionLosses27 = 0.35 * totalFootage9;
    var dilutionLosses28 = 0.35 * totalFootage10;
    
    var contingency24 = (totalFootage6 + surfaceVolume24 + CasingVolume24) * 0.2;
    var contingency25 = (totalFootage7 + surfaceVolume25 + CasingVolume25) * 0.2;
    var contingency26 = (totalFootage8 + surfaceVolume26 + CasingVolume26) * 0.2;
    var contingency27 = (totalFootage9 + surfaceVolume27 + CasingVolume27) * 0.2;
    var contingency28 = (totalFootage10 + surfaceVolume28 + CasingVolume28) * 0.2;
    
    var totalVolumeRequired24 = totalFootage6 + surfaceVolume24 + CasingVolume24 + dilutionLosses24 + contingency24;
    var totalVolumeRequired25 = totalFootage7 + surfaceVolume25 + CasingVolume25 + dilutionLosses25 + contingency25;
    var totalVolumeRequired26 = totalFootage8 + surfaceVolume26 + CasingVolume26 + dilutionLosses26 + contingency26;
    var totalVolumeRequired27 = totalFootage9 + surfaceVolume27 + CasingVolume27 + dilutionLosses27 + contingency27;
    var totalVolumeRequired28 = totalFootage10 + surfaceVolume28 + CasingVolume28 + dilutionLosses28 + contingency28;
    
    var costPerFoot6 = costPerBarrel15 * (totalVolumeRequired24 / totalFootage6);
    var costPerFoot7 = costPerBarrel16 * (totalVolumeRequired25 / totalFootage7);
    var costPerFoot8 = costPerBarrel17 * (totalVolumeRequired26 / totalFootage8);
    var costPerFoot9 = costPerBarrel18 * (totalVolumeRequired27 / totalFootage9);
    var costPerFoot10 = costPerBarrel19 * (totalVolumeRequired28 / totalFootage10);
    
    // Display Calculated Value
    document.getElementById('casingVolume15').textContent = casingVolume15.toFixed(0);
    document.getElementById('casingVolume16').textContent = casingVolume16.toFixed(0);
    document.getElementById('casingVolume17').textContent = casingVolume17.toFixed(0);
    document.getElementById('casingVolume18').textContent = casingVolume18.toFixed(0);
    document.getElementById('casingVolume19').textContent = casingVolume19.toFixed(0);
    document.getElementById('casingVolume20').textContent = casingVolume20.toFixed(0);
    document.getElementById('casingVolume21').textContent = casingVolume21.toFixed(0);
    document.getElementById('casingVolume22').textContent = casingVolume22.toFixed(0);
    document.getElementById('casingVolume23').textContent = casingVolume23.toFixed(0);
    
    document.getElementById('openHoleVolume10').textContent = openHoleVolume10.toFixed(0);
    document.getElementById('openHoleVolume11').textContent = openHoleVolume11.toFixed(0);
    document.getElementById('openHoleVolume12').textContent = openHoleVolume12.toFixed(0);
    document.getElementById('openHoleVolume13').textContent = openHoleVolume13.toFixed(0);
    document.getElementById('openHoleVolume14').textContent = openHoleVolume14.toFixed(0);
    document.getElementById('openHoleVolume15').textContent = openHoleVolume15.toFixed(0);
    document.getElementById('openHoleVolume16').textContent = openHoleVolume16.toFixed(0);
    document.getElementById('openHoleVolume17').textContent = openHoleVolume17.toFixed(0);
    document.getElementById('openHoleVolume18').textContent = openHoleVolume18.toFixed(0);
    
    document.getElementById('dilutionLosses15').textContent = dilutionLosses15.toFixed(0);
    document.getElementById('dilutionLosses17').textContent = dilutionLosses17.toFixed(0);
    document.getElementById('dilutionLosses18').textContent = dilutionLosses18.toFixed(0);
    document.getElementById('dilutionLosses19').textContent = dilutionLosses19.toFixed(0);
    document.getElementById('dilutionLosses20').textContent = dilutionLosses20.toFixed(0);
    document.getElementById('dilutionLosses21').textContent = dilutionLosses21.toFixed(0);
    document.getElementById('dilutionLosses22').textContent = dilutionLosses22.toFixed(0);
    document.getElementById('dilutionLosses23').textContent = dilutionLosses23.toFixed(0);
    
    document.getElementById('contingency15').textContent = contingency15.toFixed(0);
    document.getElementById('contingency17').textContent = contingency17.toFixed(0);
    document.getElementById('contingency18').textContent = contingency18.toFixed(0);
    document.getElementById('contingency19').textContent = contingency19.toFixed(0);
    document.getElementById('contingency20').textContent = contingency20.toFixed(0);
    document.getElementById('contingency21').textContent = contingency21.toFixed(0);
    document.getElementById('contingency22').textContent = contingency22.toFixed(0);
    document.getElementById('contingency23').textContent = contingency23.toFixed(0);
    
    
    document.getElementById('holeVolume10').textContent = holeVolume10.toFixed(0);
    document.getElementById('holeVolume11').textContent = holeVolume11.toFixed(0);
    document.getElementById('holeVolume12').textContent = holeVolume12.toFixed(0);
    document.getElementById('holeVolume13').textContent = holeVolume13.toFixed(0);
    document.getElementById('holeVolume14').textContent = holeVolume14.toFixed(0);
    document.getElementById('holeVolume15').textContent = holeVolume15.toFixed(0);
    document.getElementById('holeVolume16').textContent = holeVolume16.toFixed(0);
    document.getElementById('holeVolume17').textContent = holeVolume17.toFixed(0);
    document.getElementById('holeVolume18').textContent = holeVolume18.toFixed(0);
    
    document.getElementById('totalVolumeRequired15').textContent = totalVolumeRequired15.toFixed(0);
    document.getElementById('totalVolumeRequired16').textContent = totalVolumeRequired16.toFixed(0);
    document.getElementById('totalVolumeRequired17').textContent = totalVolumeRequired17.toFixed(0);
    document.getElementById('totalVolumeRequired18').textContent = totalVolumeRequired18.toFixed(0);
    document.getElementById('totalVolumeRequired19').textContent = totalVolumeRequired19.toFixed(0);
    document.getElementById('totalVolumeRequired20').textContent = totalVolumeRequired20.toFixed(0);
    document.getElementById('totalVolumeRequired21').textContent = totalVolumeRequired21.toFixed(0);
    document.getElementById('totalVolumeRequired22').textContent = totalVolumeRequired22.toFixed(0);
    document.getElementById('totalVolumeRequired23').textContent = totalVolumeRequired23.toFixed(0);

    document.getElementById('mudReceived10').textContent = 0;
    document.getElementById('mudReceived11').textContent = 0;
    document.getElementById('mudReceived12').textContent = 0;
    document.getElementById('mudReceived13').textContent = mudLeft12.toFixed(0);
    document.getElementById('mudReceived14').textContent = mudLeft13.toFixed(0);
    document.getElementById('mudReceived15').textContent = mudLeft14.toFixed(0);
    document.getElementById('mudReceived16').textContent = 0;
    document.getElementById('mudReceived17').textContent = mudLeft16.toFixed(0);
    document.getElementById('mudReceived18').textContent = mudLeft17.toFixed(0);
    
    document.getElementById('newMud10').textContent = newMud10.toFixed(0);
    document.getElementById('newMud11').textContent = newMud11.toFixed(0);
    document.getElementById('newMud12').textContent = newMud12.toFixed(0);
    document.getElementById('newMud13').textContent = newMud13.toFixed(0);
    document.getElementById('newMud14').textContent = newMud14.toFixed(0);
    document.getElementById('newMud15').textContent = newMud15.toFixed(0);
    document.getElementById('newMud16').textContent = newMud16.toFixed(0);
    document.getElementById('newMud17').textContent = newMud17.toFixed(0);
    document.getElementById('newMud18').textContent = newMud18.toFixed(0);
    
    document.getElementById('mudLeft10').textContent = mudLeft10.toFixed(0);
    document.getElementById('mudLeft11').textContent = mudLeft11.toFixed(0);
    document.getElementById('mudLeft12').textContent = mudLeft12.toFixed(0);
    document.getElementById('mudLeft13').textContent = mudLeft13.toFixed(0);
    document.getElementById('mudLeft14').textContent = mudLeft14.toFixed(0);
    document.getElementById('mudLeft15').textContent = mudLeft15.toFixed(0);
    document.getElementById('mudLeft16').textContent = mudLeft16.toFixed(0);
    document.getElementById('mudLeft17').textContent = mudLeft17.toFixed(0);
    document.getElementById('mudLeft18').textContent = mudLeft18.toFixed(0);
    
    document.getElementById('costPerFootDrilled10').textContent = costPerFootDrilled10.toFixed(2);
    document.getElementById('costPerFootDrilled11').textContent = costPerFootDrilled11.toFixed(2);
    document.getElementById('costPerFootDrilled12').textContent = costPerFootDrilled12.toFixed(2);
    document.getElementById('costPerFootDrilled13').textContent = costPerFootDrilled13.toFixed(2);
    document.getElementById('costPerFootDrilled14').textContent = costPerFootDrilled14.toFixed(2);
    document.getElementById('costPerFootDrilled15').textContent = costPerFootDrilled15.toFixed(2);
    document.getElementById('costPerFootDrilled16').textContent = costPerFootDrilled16.toFixed(2);
    document.getElementById('costPerFootDrilled17').textContent = costPerFootDrilled17.toFixed(2);
    document.getElementById('costPerFootDrilled18').textContent = costPerFootDrilled18.toFixed(2);
    
    
    // Display Completion Parameters
    document.getElementById('totalFootage6').textContent = totalFootage6.toFixed(0);
    document.getElementById('totalFootage7').textContent = totalFootage7.toFixed(0);
    document.getElementById('totalFootage8').textContent = totalFootage8.toFixed(0);
    document.getElementById('totalFootage9').textContent = totalFootage9.toFixed(0);
    document.getElementById('totalFootage10').textContent = totalFootage10.toFixed(0);

    document.getElementById('surfaceVolume24').textContent = surfaceVolume24.toFixed(0);
    document.getElementById('surfaceVolume25').textContent = surfaceVolume25.toFixed(0);
    document.getElementById('surfaceVolume26').textContent = surfaceVolume26.toFixed(0);
    document.getElementById('surfaceVolume27').textContent = surfaceVolume27.toFixed(0);
    document.getElementById('surfaceVolume28').textContent = surfaceVolume28.toFixed(0);
    
    document.getElementById('casingVolume24').textContent = CasingVolume24.toFixed(0);
    document.getElementById('casingVolume25').textContent = CasingVolume25.toFixed(0);
    document.getElementById('casingVolume26').textContent = CasingVolume26.toFixed(0);
    document.getElementById('casingVolume27').textContent = CasingVolume27.toFixed(0);
    document.getElementById('casingVolume28').textContent = CasingVolume28.toFixed(0);
        
    document.getElementById('contingency24').textContent = contingency24.toFixed(0);
    document.getElementById('contingency25').textContent = contingency25.toFixed(0);
    document.getElementById('contingency26').textContent = contingency26.toFixed(0);
    document.getElementById('contingency27').textContent = contingency27.toFixed(0);
    document.getElementById('contingency28').textContent = contingency28.toFixed(0);
    
    document.getElementById('dilutionLosses24').textContent = dilutionLosses24.toFixed(0);
    document.getElementById('dilutionLosses25').textContent = dilutionLosses25.toFixed(0);
    document.getElementById('dilutionLosses26').textContent = dilutionLosses26.toFixed(0);
    document.getElementById('dilutionLosses27').textContent = dilutionLosses27.toFixed(0);
    document.getElementById('dilutionLosses28').textContent = dilutionLosses28.toFixed(0);
    
    document.getElementById('totalVolumeRequired24').textContent = totalVolumeRequired24.toFixed(0);
    document.getElementById('totalVolumeRequired25').textContent = totalVolumeRequired25.toFixed(0);
    document.getElementById('totalVolumeRequired26').textContent = totalVolumeRequired26.toFixed(0);
    document.getElementById('totalVolumeRequired27').textContent = totalVolumeRequired27.toFixed(0);
    document.getElementById('totalVolumeRequired28').textContent = totalVolumeRequired28.toFixed(0);

    document.getElementById('costPerBarrel15').textContent = costPerBarrel15.toFixed(2);
    document.getElementById('costPerBarrel16').textContent = costPerBarrel16.toFixed(2);
    document.getElementById('costPerBarrel17').textContent = costPerBarrel17.toFixed(2);
    document.getElementById('costPerBarrel18').textContent = costPerBarrel18.toFixed(2);
    document.getElementById('costPerBarrel19').textContent = costPerBarrel19.toFixed(2);
    
    document.getElementById('costPerFoot6').textContent = costPerFoot6.toFixed(2);
    document.getElementById('costPerFoot7').textContent = costPerFoot7.toFixed(2);
    document.getElementById('costPerFoot8').textContent = costPerFoot8.toFixed(2);
    document.getElementById('costPerFoot9').textContent = costPerFoot9.toFixed(2);
    document.getElementById('costPerFoot10').textContent = costPerFoot10.toFixed(2);
}