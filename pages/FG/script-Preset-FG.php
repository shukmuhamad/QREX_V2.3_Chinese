
        <script>

        var list = 0;
        var _selectedSize = '';
        var sizeRow = '';
        var sizeNew = '';


        var totalOrder = 0;
        var totalCTN = 0;
        var totalPallet = 0;
        var maxCTN = 0;
        var Alltotalpallet = 0;
        var palletdetails = [];
        var _aqlHole = 0;
        var _aqlNFG = 0;
        var _aqlNAG = 0;
        var _aqlMajor = 0;
        var _aqlMinor = 0;
        var tempAcc = 0;

        var _totalpallet1 = 0;
        var _totalCTN1 = 0;
        var _totalPCS1 = 0;
        var _balanceCTN1 = 0;
        var _actualctn1 = 0;
        var _formula1 = 0;
        var _sampleSize1 = 0;
        var _ctnTake1 = 0;
        var _pallet1_1 = 0;
        var _ctn1_1 = 0;
        var _pallet1_2 = 0;
        var _ctn1_2 = 0;
        var _pcsctn1_1 = 0;
        var _pcsctn1_2 = 0;
        var _ctnout1_1 = 0;
        var _ctnout1_2 = 0;

        var _totalpallet2 = 0;
        var _totalCTN2 = 0;
        var _totalPCS2 = 0;
        var _balanceCTN2 = 0;
        var _actualctn2 = 0;
        var _formula2 = 0;
        var _sampleSize2 = 0;
        var _ctnTake2 = 0;
        var _pallet2_1 = 0;
        var _ctn2_1 = 0;
        var _pallet2_2 = 0;
        var _ctn2_2 = 0;
        var _pcsctn2_1 = 0;
        var _pcsctn2_2 = 0;
        var _ctnout2_1 = 0;
        var _ctnout2_2 = 0;

        var _totalpallet3 = 0;
        var _totalCTN3 = 0;
        var _totalPCS3 = 0;
        var _balanceCTN3 = 0;
        var _actualctn3 = 0;
        var _formula3 = 0;
        var _sampleSize3 = 0;
        var _ctnTake3 = 0;
        var _pallet3_1 = 0;
        var _ctn3_1 = 0;
        var _pallet3_2 = 0;
        var _ctn3_2 = 0;
        var _pcsctn3_1 = 0;
        var _pcsctn3_2 = 0;
        var _ctnout3_1 = 0;
        var _ctnout3_2 = 0;

        var _totalpallet4 = 0;
        var _totalCTN4 = 0;
        var _totalPCS4 = 0;
        var _balanceCTN4 = 0;
        var _actualctn4 = 0;
        var _formula4 = 0;
        var _sampleSize4 = 0;
        var _ctnTake4 = 0;
        var _pallet4_1 = 0;
        var _ctn4_1 = 0;
        var _pallet4_2 = 0;
        var _ctn4_2 = 0;
        var _pcsctn4_1 = 0;
        var _pcsctn4_2 = 0;
        var _ctnout4_1 = 0;
        var _ctnout4_2 = 0;

        var _totalpallet5 = 0;
        var _totalCTN5 = 0;
        var _totalPCS5 = 0;
        var _balanceCTN5 = 0;
        var _actualctn5 = 0;
        var _formula5 = 0;
        var _sampleSize5 = 0;
        var _ctnTake5 = 0;
        var _pallet5_1 = 0;
        var _ctn5_1 = 0;
        var _pallet5_2 = 0;
        var _ctn5_2 = 0;
        var _pcsctn5_1 = 0;
        var _pcsctn5_2 = 0;
        var _ctnout5_1 = 0;
        var _ctnout5_2 = 0;

        const samplingplanArr = [
          {ss:'32',	aql:'0.065',	acc:'0',	rej:'1'},
          {ss:'32',	aql:'0.10',	acc:'0',	rej:'1'},
          {ss:'32',	aql:'0.15',	acc:'0',	rej:'1'},
          {ss:'32',	aql:'0.25',	acc:'0',	rej:'1'},
          {ss:'32',	aql:'0.40',	acc:'0',	rej:'1'},
          {ss:'32',	aql:'0.65',	acc:'0',	rej:'1'},
          {ss:'32',	aql:'1.00',	acc:'1',	rej:'2'},
          {ss:'32',	aql:'1.50',	acc:'1',	rej:'2'},
          {ss:'32',	aql:'2.50',	acc:'2',	rej:'3'},
          {ss:'32',	aql:'4.00',	acc:'3',	rej:'4'},
          {ss:'32',	aql:'6.50',	acc:'5',	rej:'6'},

          {ss:'50',	aql:'0.065',	acc:'0',	rej:'1'},
          {ss:'50',	aql:'0.10',	acc:'0',	rej:'1'},
          {ss:'50',	aql:'0.15',	acc:'0',	rej:'1'},
          {ss:'50',	aql:'0.25',	acc:'0',	rej:'1'},
          {ss:'50',	aql:'0.40',	acc:'0',	rej:'1'},
          {ss:'50',	aql:'0.65',	acc:'1',	rej:'2'},
          {ss:'50',	aql:'1.00',	acc:'2',	rej:'3'},
          {ss:'50',	aql:'1.50',	acc:'3',	rej:'4'},
          {ss:'50',	aql:'2.50',	acc:'5',	rej:'6'},
          {ss:'50',	aql:'4.00',	acc:'7',	rej:'8'},
          {ss:'50',	aql:'6.50',	acc:'1',	rej:'2'},

          {ss:'80',	aql:'0.065',	acc:'0',	rej:'1'},
          {ss:'80',	aql:'0.10',	acc:'0',	rej:'1'},
          {ss:'80',	aql:'0.15',	acc:'0',	rej:'1'},
          {ss:'80',	aql:'0.25',	acc:'0',	rej:'1'},
          {ss:'80',	aql:'0.40',	acc:'1',	rej:'2'},
          {ss:'80',	aql:'0.65',	acc:'1',	rej:'2'},
          {ss:'80',	aql:'1.00',	acc:'2',	rej:'3'},
          {ss:'80',	aql:'1.50',	acc:'3',	rej:'4'},
          {ss:'80',	aql:'2.50',	acc:'5',	rej:'6'},
          {ss:'80',	aql:'4.00',	acc:'7',	rej:'8'},
          {ss:'80',	aql:'6.50',	acc:'10',	rej:'11'},

          {ss:'125',	aql:'0.065',	acc:'0',	rej:'1'},
          {ss:'125',	aql:'0.10',	acc:'0',	rej:'1'},
          {ss:'125',	aql:'0.15',	acc:'0',	rej:'1'},
          {ss:'125',	aql:'0.25',	acc:'1',	rej:'2'},
          {ss:'125',	aql:'0.40',	acc:'1',	rej:'2'},
          {ss:'125',	aql:'0.65',	acc:'2',	rej:'3'},
          {ss:'125',	aql:'1.00',	acc:'3',	rej:'4'},
          {ss:'125',	aql:'1.50',	acc:'5',	rej:'6'},
          {ss:'125',	aql:'2.50',	acc:'7',	rej:'8'},
          {ss:'125',	aql:'4.00',	acc:'10',	rej:'11'},
          {ss:'125',	aql:'6.50',	acc:'14',	rej:'15'},

          {ss:'200',	aql:'0.065',	acc:'0',	rej:'1'},
          {ss:'200',	aql:'0.10',	acc:'0',	rej:'1'},
          {ss:'200',	aql:'0.15',	acc:'0',	rej:'1'},
          {ss:'200',	aql:'0.25',	acc:'1',	rej:'2'},
          {ss:'200',	aql:'0.40',	acc:'2',	rej:'3'},
          {ss:'200',	aql:'0.65',	acc:'3',	rej:'4'},
          {ss:'200',	aql:'1.00',	acc:'5',	rej:'6'},
          {ss:'200',	aql:'1.50',	acc:'7',	rej:'8'},
          {ss:'200',	aql:'2.50',	acc:'10',	rej:'11'},
          {ss:'200',	aql:'4.00',	acc:'14',	rej:'15'},
          {ss:'200',	aql:'6.50',	acc:'21',	rej:'22'},

          {ss:'315',	aql:'0.065',	acc:'0',	rej:'1'},
          {ss:'315',	aql:'0.10',	acc:'1',	rej:'2'},
          {ss:'315',	aql:'0.15',	acc:'1',	rej:'2'},
          {ss:'315',	aql:'0.25',	acc:'2',	rej:'3'},
          {ss:'315',	aql:'0.40',	acc:'3',	rej:'4'},
          {ss:'315',	aql:'0.65',	acc:'5',	rej:'6'},
          {ss:'315',	aql:'1.00',	acc:'7',	rej:'8'},
          {ss:'315',	aql:'1.50',	acc:'10',	rej:'11'},
          {ss:'315',	aql:'2.50',	acc:'14',	rej:'15'},
          {ss:'315',	aql:'4.00',	acc:'21',	rej:'22'},
          {ss:'315',	aql:'6.50',	acc:'33',	rej:'34'},

          {ss:'500',	aql:'0.065',	acc:'1',	rej:'2'},
          {ss:'500',	aql:'0.10',	acc:'1',	rej:'2'},
          {ss:'500',	aql:'0.15',	acc:'2',	rej:'3'},
          {ss:'500',	aql:'0.25',	acc:'3',	rej:'4'},
          {ss:'500',	aql:'0.40',	acc:'5',	rej:'6'},
          {ss:'500',	aql:'0.65',	acc:'7',	rej:'8'},
          {ss:'500',	aql:'1.00',	acc:'10',	rej:'11'},
          {ss:'500',	aql:'1.50',	acc:'14',	rej:'15'},
          {ss:'500',	aql:'2.50',	acc:'21',	rej:'22'},
          {ss:'500',	aql:'4.00',	acc:'33',	rej:'34'},
          {ss:'500',	aql:'6.50',	acc:'52',	rej:'53'}
          ];

          // console.table(samplingplanArr);

        $("#totalOrder").keyup(function(){
          totalOrder = $(this).val();
          if(totalOrder == ''){
            totalOrder = 0;
          }
          console.log(totalOrder);

          if(totalOrder > 0 && totalCTN > 0 && totalPallet > 0 && maxCTN > 0){
            calculateProcess();
          }
        });

        $("#totalCTN").keyup(function(){
          totalCTN = $(this).val();
          if(totalCTN == ''){
            totalCTN = 0;
          }
          console.log(totalCTN);

          if(totalOrder > 0 && totalCTN > 0 && totalPallet > 0 && maxCTN > 0){
            calculateProcess();
          }
        });

        $("#totalPallet").keyup(function(){
          totalPallet = $(this).val();
          if(totalPallet == ''){
            totalPallet = 0;
          }
          console.log(totalPallet);

          if(totalOrder > 0 && totalCTN > 0 && totalPallet > 0 && maxCTN > 0){
            calculateProcess();
          }
        });

        $("#maxCTN").keyup(function(){
          maxCTN = $(this).val();
          if(maxCTN == ''){
            maxCTN = 0;
          }
          console.log(maxCTN);

          if(totalOrder > 0 && totalCTN > 0 && totalPallet > 0 && maxCTN > 0){
            calculateProcess();
          }
        });


// --------------------function calculate process----------------------
        function calculateProcess(){

          // ---------- lot number 1 --------------
          if(totalOrder - 1 >= maxCTN){
            _totalpallet1 = Math.floor(maxCTN/totalCTN);
            _totalCTN1 = _totalpallet1*totalCTN;
          }else{
            _totalpallet1 = Math.ceil(maxCTN/totalCTN);
            _totalCTN1 = totalOrder;
          }

          if(totalOrder >= maxCTN){
            _totalPCS1 = _totalCTN1*1000;
          }else{
            _totalPCS1 = totalOrder*1000;
          }

          _balanceCTN1 = totalOrder - _totalCTN1;
          if(_balanceCTN1 <= 0){
            _balanceCTN1 = 0;
          }
          _actualctn1 = _totalPCS1/1000;
          if(_balanceCTN1 >= 1000){
            _formula1 = 1000;
          }else{
            _formula1 = _balanceCTN1;
          }

          _sampleSize1 = samplesize_Check(_totalPCS1);

          if(Math.sqrt(_actualctn1)>=13){
            _ctnTake1 = 13;
          }else{
            _ctnTake1 = Math.ceil(Math.sqrt(_actualctn1));
          }
          _ctn1_1 = Math.floor(_ctnTake1/_totalpallet1);
          _ctn1_2 = Math.ceil(_ctnTake1/_totalpallet1);
          _pallet1_1 = (_ctn1_2*_totalpallet1)-_ctnTake1;
          _pallet1_2 = _ctnTake1-(_ctn1_1*_totalpallet1);
          _pcsctn1_1 = Math.floor(_sampleSize1/_ctnTake1);
          _pcsctn1_2 = Math.ceil(_sampleSize1/_ctnTake1);
          _ctnout1_1 = (_pcsctn1_2*_ctnTake1)-_sampleSize1;
          _ctnout1_2 = _sampleSize1-(_pcsctn1_1*_ctnTake1);

          console.log(_ctnTake1);
          console.log(_pcsctn1_1);
          console.log(_pcsctn1_2);
          console.log(_ctnout1_1);
          console.log(_ctnout1_2);


          $('#TPallet1').val(_totalpallet1);
          $('#TCTN1').val(_totalCTN1);
          $('#TPcs1').val(_totalPCS1);
          $('#Balance1').val(_balanceCTN1);
          $('#ATCTN1').val(_actualctn1);
          $('#Formula1').val(_formula1);
          $('#TSS1').val(_sampleSize1);

          // ---------- lot number 2 --------------
          if(_formula1 == maxCTN){
            _totalpallet2 = Math.floor(_formula1/totalCTN);
          }else{
            _totalpallet2 = Math.ceil(_formula1/totalCTN);
          }
          _totalCTN2 = _totalpallet2*totalCTN;
          if(_balanceCTN1 >= _totalCTN2){
            _totalPCS2 = _totalCTN2*1000;
          }else{
            _totalPCS2 = _balanceCTN1*1000;
          }

          _balanceCTN2 = _balanceCTN1 - _totalCTN2;
          if(_balanceCTN2 <= 0){
            _balanceCTN2 = 0;
          }
          _actualctn2 = _totalPCS2/1000;
          if(_balanceCTN2 >= 1000){
            _formula2 = 1000;
          }else{
            _formula2 = _balanceCTN2;
          }

          _sampleSize2 = samplesize_Check(_totalPCS2);

          if(Math.sqrt(_actualctn2)>=13){
            _ctnTake2 = 13;
          }else{
            _ctnTake2 = Math.ceil(Math.sqrt(_actualctn2));
          }
          _ctn2_1 = Math.floor(_ctnTake2/_totalpallet2);
          _ctn2_2 = Math.ceil(_ctnTake2/_totalpallet2);
          _pallet2_1 = (_ctn2_2*_totalpallet2)-_ctnTake2;
          _pallet2_2 = _ctnTake2-(_ctn2_1*_totalpallet2);
          _pcsctn2_1 = Math.floor(_sampleSize2/_ctnTake2);
          _pcsctn2_2 = Math.ceil(_sampleSize2/_ctnTake2);
          _ctnout2_1 = (_pcsctn2_2*_ctnTake2)-_sampleSize2;
          _ctnout2_2 = _sampleSize2-(_pcsctn2_1*_ctnTake2);

          $('#TPallet2').val(_totalpallet2);
          $('#TCTN2').val(_totalCTN2);
          $('#TPcs2').val(_totalPCS2);
          $('#Balance2').val(_balanceCTN2);
          $('#ATCTN2').val(_actualctn2);
          $('#Formula2').val(_formula2);
          $('#TSS2').val(_sampleSize2);

          // ---------- lot number 3 --------------
          if(_formula2 == maxCTN){
            _totalpallet3 = Math.floor(_formula2/totalCTN);
          }else{
            _totalpallet3 = Math.ceil(_formula2/totalCTN);
          }
          _totalCTN3 = _totalpallet3*totalCTN;
          if(_balanceCTN2 >= _totalCTN3){
            _totalPCS3 = _totalCTN3*1000;
          }else{
            _totalPCS3 = _balanceCTN2*1000;
          }

          _balanceCTN3 = _balanceCTN2 - _totalCTN3;
          if(_balanceCTN3 <= 0){
            _balanceCTN3 = 0;
          }
          _actualctn3 = _totalPCS3/1000;
          if(_balanceCTN3 >= 1000){
            _formula3 = 1000;
          }else{
            _formula3 = _balanceCTN3;
          }

          _sampleSize3 = samplesize_Check(_totalPCS3);

          if(Math.sqrt(_actualctn3)>=13){
            _ctnTake3 = 13;
          }else{
            _ctnTake3 = Math.ceil(Math.sqrt(_actualctn3));
          }
          _ctn3_1 = Math.floor(_ctnTake3/_totalpallet3);
          _ctn3_2 = Math.ceil(_ctnTake3/_totalpallet3);
          _pallet3_1 = (_ctn3_2*_totalpallet3)-_ctnTake3;
          _pallet3_2 = _ctnTake3-(_ctn3_1*_totalpallet3);
          _pcsctn3_1 = Math.floor(_sampleSize3/_ctnTake3);
          _pcsctn3_2 = Math.ceil(_sampleSize3/_ctnTake3);
          _ctnout3_1 = (_pcsctn3_2*_ctnTake3)-_sampleSize3;
          _ctnout3_2 = _sampleSize3-(_pcsctn3_1*_ctnTake3);

          $('#TPallet3').val(_totalpallet3);
          $('#TCTN3').val(_totalCTN3);
          $('#TPcs3').val(_totalPCS3);
          $('#Balance3').val(_balanceCTN3);
          $('#ATCTN3').val(_actualctn3);
          $('#Formula3').val(_formula3);
          $('#TSS3').val(_sampleSize3);

          // ---------- lot number 4 --------------
          if(_formula3 == maxCTN){
            _totalpallet4 = Math.floor(_formula3/totalCTN);
          }else{
            _totalpallet4 = Math.ceil(_formula3/totalCTN);
          }
          _totalCTN4 = _totalpallet4*totalCTN;
          if(_balanceCTN3 >= _totalCTN4){
            _totalPCS4 = _totalCTN4*1000;
          }else{
            _totalPCS4 = _balanceCTN3*1000;
          }

          _balanceCTN4 = _balanceCTN3 - _totalCTN4;
          if(_balanceCTN4 <= 0){
            _balanceCTN4 = 0;
          }
          _actualctn4 = _totalPCS4/1000;
          if(_balanceCTN4 >= 1000){
            _formula4 = 1000;
          }else{
            _formula4 = _balanceCTN4;
          }
          _sampleSize4 = samplesize_Check(_totalPCS4);

          if(Math.sqrt(_actualctn4)>=13){
            _ctnTake4 = 13;
          }else{
            _ctnTake4 = Math.ceil(Math.sqrt(_actualctn4));
          }
          _ctn4_1 = Math.floor(_ctnTake4/_totalpallet4);
          _ctn4_2 = Math.ceil(_ctnTake4/_totalpallet4);
          _pallet4_1 = (_ctn4_2*_totalpallet4)-_ctnTake4;
          _pallet4_2 = _ctnTake4-(_ctn4_1*_totalpallet4);
          _pcsctn4_1 = Math.floor(_sampleSize4/_ctnTake4);
          _pcsctn4_2 = Math.ceil(_sampleSize4/_ctnTake4);
          _ctnout4_1 = (_pcsctn4_2*_ctnTake4)-_sampleSize4;
          _ctnout4_2 = _sampleSize4-(_pcsctn4_1*_ctnTake4);

          $('#TPallet4').val(_totalpallet4);
          $('#TCTN4').val(_totalCTN4);
          $('#TPcs4').val(_totalPCS4);
          $('#Balance4').val(_balanceCTN4);
          $('#ATCTN4').val(_actualctn4);
          $('#Formula4').val(_formula4);
          $('#TSS4').val(_sampleSize4);

          // ---------- lot number 5 --------------
          if(_formula4 == maxCTN){
            _totalpallet5 = Math.floor(_formula4/totalCTN);
          }else{
            _totalpallet5 = Math.ceil(_formula4/totalCTN);
          }
          _totalCTN5 = _totalpallet5*totalCTN;
          if(_balanceCTN4 >= _totalCTN5){
            _totalPCS5 = _totalCTN5*1000;
          }else{
            _totalPCS5 = _balanceCTN4*1000;
          }

          _balanceCTN5 = _balanceCTN4 - _totalCTN4;
          if(_balanceCTN5 <= 0){
            _balanceCTN5 = 0;
          }
          _actualctn5 = _totalPCS5/1000;
          if(_balanceCTN5 >= 1000){
            _formula5 = 1000;
          }else{
            _formula5 = _balanceCTN5;
          }

          _sampleSize5 = samplesize_Check(_totalPCS5);

          if(Math.sqrt(_actualctn5)>=13){
            _ctnTake5 = 13;
          }else{
            _ctnTake5 = Math.ceil(Math.sqrt(_actualctn5));
          }
          _ctn5_1 = Math.floor(_ctnTake5/_totalpallet5);
          _ctn5_2 = Math.ceil(_ctnTake5/_totalpallet5);
          _pallet5_1 = (_ctn5_2*_totalpallet5)-_ctnTake5;
          _pallet5_2 = _ctnTake5-(_ctn5_1*_totalpallet5);
          _pcsctn5_1 = Math.floor(_sampleSize5/_ctnTake5);
          _pcsctn5_2 = Math.ceil(_sampleSize5/_ctnTake5);
          _ctnout5_1 = (_pcsctn5_2*_ctnTake5)-_sampleSize5;
          _ctnout5_2 = _sampleSize5-(_pcsctn5_1*_ctnTake5);

          $('#TPallet5').val(_totalpallet5);
          $('#TCTN5').val(_totalCTN5);
          $('#TPcs5').val(_totalPCS5);
          $('#Balance5').val(_balanceCTN5);
          $('#ATCTN5').val(_actualctn5);
          $('#Formula5').val(_formula5);
          $('#TSS5').val(_sampleSize5);


            // acceptanceVal(500,0.10);

        }

// --------------------function check sample size----------------------
        function samplesize_Check(ssVal){

            var result;

            if (ssVal > 500000){
              result = 500;
            }else if (ssVal > 150000) {
              result = 315;
            }else if (ssVal > 35000) {
              result = 200;
            }else if (ssVal > 10000) {
              result = 125;
            }else if (ssVal > 3200) {
              result = 80;
            }else if (ssVal > 1200) {
              result = 50;
            }else if (ssVal > 500) {
              result = 32;
            }else{
              result = 0;
            }

          return result;
        }

// --------------------function calculate acceptance ----------------------
        function acceptanceVal(ssVal, aqlVal){
          var query = {ss:ssVal, aql:aqlVal};
          var accresult = samplingplanArr.filter(item => {
            for (let key in query) {
              if (item[key] === undefined || item[key] != query[key])
                return false;
          }
            return true;
          });

          // console.table(accresult);
          // tempAcc = accresult[0].acc;
          // console.log(accresult[acc]);

          return accresult[0].acc;

        }

// --------------------function generate button ----------------------


        $(document).on('click', '.generate', function(){
          alert("generate");
           presetpalletDetails();
        });

// --------------------function generate presetpallet tables ----------------------

        function presetpalletDetails(){
          Alltotalpallet = _totalpallet1 + _totalpallet2 + _totalpallet3 + _totalpallet4 + _totalpallet5;
          var palletnum = 1;
          var palletval = 0;
          var temp_details =[];
          var ctntotakeout = 0;
          var ctntotakecount = 1;
          var PcsInner1_1 = 0;
          var PcsInner2_1 = 0;
          var PcsInner1_2 = 0;
          var PcsInner2_2 = 0;
          var accHole = 0;
          var accNFG = 0;
          var accNAG = 0;
          var accMajor = 0;
          var accMinor = 0;
          var tempSS = 0;

//------------- GET AQL Value -----------------------

          _aqlHole = $('#AQL_holes').val();
          _aqlNFG = $('#AQL_NFG').val();
          _aqlNAG = $('#AQL_NAG').val();
          _aqlMajor = $('#AQL_Major').val();
          _aqlMinor = $('#AQL_Minor').val();
          // console.log(_totalpallet1);

 //--------------------loop for lot 1 -------------------------------------

              while (palletval < _pallet1_1) {
                InnerCtn1 = Math.ceil(_ctn1_1/2);
                InnerCtn2 = _ctn1_1 - InnerCtn1;

                PcsInner1_1 = _pcsctn1_1*InnerCtn1;
                if(palletnum == _totalpallet1){
                  console.log("sec 1:"+_sampleSize1+" and "+PcsInner1_2+" and "+tempSS);
                  PcsInner2_1 = _sampleSize1-PcsInner1_1-tempSS;
                }else{
                  PcsInner2_1 = _pcsctn1_1*InnerCtn2;
                }

                PcsInner1_2 = _pcsctn1_2*InnerCtn1;
                if(palletnum == _totalpallet1){
                  console.log("sec 2:"+_sampleSize1+" and "+PcsInner1_2+" and "+tempSS);
                  PcsInner2_2 = _sampleSize1-PcsInner1_2-tempSS;
                }else{
                  PcsInner2_2 = _pcsctn1_2*InnerCtn2;
                }

                console.log("-------------");
                console.log(palletval);
                console.log(_pallet1_2);
                console.log(ctntotakeout);
                console.log(_ctnout1_2);
                console.log(ctntotakecount);
                console.log("-------------");

                temp_ctntotakeout1 = ctntotakeout + InnerCtn1;
                temp_ctntotakeout2 = ctntotakeout + InnerCtn1 + InnerCtn2;


                accHole = acceptanceVal(_sampleSize1,_aqlHole);
                accNAG = acceptanceVal(_sampleSize1,_aqlNFG);
                accNFG = acceptanceVal(_sampleSize1,_aqlNAG);
                accMAjor = acceptanceVal(_sampleSize1,_aqlMajor);
                accMinor = acceptanceVal(_sampleSize1,_aqlMinor);

                if (palletnum == _totalpallet1 && temp_ctntotakeout1 >= _ctnout1_1 && ctntotakecount == 1){
                  temp_details = [
                    {Itemnumber : 0,
                    LotCount : 1,
                    PalletNumber : palletnum,
                    CtnPallet : _ctn1_2,
                    InnerCtn : InnerCtn1,
                    PcsInner : PcsInner1_2,
                    InnerCtn2 : InnerCtn2,
                    PcsInner2 : PcsInner2_2,
                    SSVisual :  PcsInner1_2+PcsInner2_2,
                    SSApt :  PcsInner1_2+PcsInner2_2,
                    AccHoles : accHole,
                    AccNFG : accNAG,
                    AccNAG : accNFG,
                    AccMajor : accMAjor,
                    AccMinor : accMinor}
                  ];
                  tempSS += PcsInner1_2+PcsInner2_2;
                  // ctntotakeout++;
                  ctntotakeout +=_ctn1_1;
                  console.log("-------------");
                  console.log(ctntotakeout);
                  console.log("-------------");
                  palletnum++;
                  palletval++;
                  palletdetails = palletdetails.concat(temp_details);
                }else if(ctntotakeout < _ctnout1_1 && ctntotakecount == 1){
                  temp_details = [
                    {Itemnumber : 0,
                    LotCount : 1,
                    PalletNumber : palletnum,
                    CtnPallet : _ctn1_1,
                    InnerCtn : InnerCtn1,
                    PcsInner : PcsInner1_1,
                    InnerCtn2 : InnerCtn2,
                    PcsInner2 : PcsInner2_1,
                    SSVisual : PcsInner1_1+PcsInner2_1,
                    SSApt :  PcsInner1_1+PcsInner2_1,
                    AccHoles : accHole,
                    AccNFG : accNAG,
                    AccNAG : accNFG,
                    AccMajor : accMAjor,
                    AccMinor : accMinor}
                  ];
                  tempSS += PcsInner1_1+PcsInner2_1;
                  // ctntotakeout++;
                  ctntotakeout+=_ctn1_1;
                  console.log("-------------");
                  console.log(ctntotakeout);
                  console.log("-------------");
                  palletnum++;
                  palletval++;
                  palletdetails = palletdetails.concat(temp_details);
                }else if (ctntotakeout < _ctnout1_2 && ctntotakecount == 2) {
                  temp_details = [
                    {Itemnumber : 0,
                    LotCount : 1,
                    PalletNumber : palletnum,
                    CtnPallet : _ctn1_1,
                    InnerCtn : InnerCtn1,
                    PcsInner : PcsInner1_2,
                    InnerCtn2 : InnerCtn2,
                    PcsInner2 : PcsInner2_2,
                    SSVisual :  PcsInner1_2+PcsInner2_2,
                    SSApt :  PcsInner1_2+PcsInner2_2,
                    AccHoles : accHole,
                    AccNFG : accNAG,
                    AccNAG : accNFG,
                    AccMajor : accMAjor,
                    AccMinor : accMinor}
                  ];
                  tempSS += PcsInner1_2+PcsInner2_2;
                  // ctntotakeout++;
                  ctntotakeout+=_ctn1_1;
                  console.log("-------------");
                  console.log(ctntotakeout);
                  console.log("-------------");
                  palletnum++;
                  palletval++;
                  palletdetails = palletdetails.concat(temp_details);
                }else if (ctntotakeout >= _ctnout1_1 && ctntotakecount == 1){
                  ctntotakeout = 0;
                  ctntotakecount = 2;
                }
              }
              palletval = 0;

              while (palletval < _pallet1_2) {
                InnerCtn1 = Math.ceil(_ctn1_2/2);
                InnerCtn2 = _ctn1_2 - InnerCtn1;

                PcsInner1_1 = _pcsctn1_1*InnerCtn1;
                if(palletnum == _totalpallet1){
                  PcsInner2_1 = _sampleSize1-PcsInner1_1-tempSS;
                    console.log("sec 3:"+_sampleSize1+" and "+PcsInner1_2+" and "+tempSS+" and "+PcsInner2_1 );
                }else{
                  PcsInner2_1 = _pcsctn1_1*InnerCtn2;
                }

                PcsInner1_2 = _pcsctn1_2*InnerCtn1;
                if(palletnum == _totalpallet1){
                  PcsInner2_2 = _sampleSize1-PcsInner1_2-tempSS;
                  console.log("sec 4:"+_sampleSize1+" and "+PcsInner1_2+" and "+tempSS+" and "+PcsInner2_2);
                }else{
                  PcsInner2_2 = _pcsctn1_2*InnerCtn2;
                }

                console.log("-------------");
                console.log(palletval);
                console.log(_pallet1_2);
                console.log(ctntotakeout);
                console.log(_ctnout1_2);
                console.log(ctntotakecount);
                console.log("-------------");

                temp_ctntotakeout1 = ctntotakeout + InnerCtn1;
                temp_ctntotakeout2 = ctntotakeout + InnerCtn1 + InnerCtn2;

                if (palletnum == _totalpallet1 && temp_ctntotakeout1 >= _ctnout1_1 && ctntotakecount == 1){
                  temp_details = [
                    {Itemnumber : 0,
                    LotCount : 1,
                    PalletNumber : palletnum,
                    CtnPallet : _ctn1_2,
                    InnerCtn : InnerCtn1,
                    PcsInner : PcsInner1_2,
                    InnerCtn2 : InnerCtn2,
                    PcsInner2 : PcsInner2_2,
                    SSVisual :  PcsInner1_2+PcsInner2_2,
                    SSApt :  PcsInner1_2+PcsInner2_2,
                    AccHoles : accHole,
                    AccNFG : accNAG,
                    AccNAG : accNFG,
                    AccMajor : accMAjor,
                    AccMinor : accMinor}
                  ];
                  tempSS += PcsInner1_2+PcsInner2_2;
                  // ctntotakeout++;
                  ctntotakeout +=_ctn1_2;
                  console.log("-------------");
                  console.log(ctntotakeout);
                  console.log("-------------");
                  palletnum++;
                  palletval++;
                  palletdetails = palletdetails.concat(temp_details);
                }else if(ctntotakeout < _ctnout1_1 && ctntotakecount == 1){
                  temp_details = [
                    {Itemnumber : 0,
                    LotCount : 1,
                    PalletNumber : palletnum,
                    CtnPallet : _ctn1_2,
                    InnerCtn : InnerCtn1,
                    PcsInner : PcsInner1_1,
                    InnerCtn2 : InnerCtn2,
                    PcsInner2 : PcsInner2_1,
                    SSVisual :  PcsInner1_1+PcsInner2_1,
                    SSApt :  PcsInner1_1+PcsInner2_1,
                    AccHoles : accHole,
                    AccNFG : accNAG,
                    AccNAG : accNFG,
                    AccMajor : accMAjor,
                    AccMinor : accMinor}
                  ];
                  tempSS += PcsInner1_1+PcsInner2_1;
                  // ctntotakeout++;
                  ctntotakeout +=_ctn1_2;
                  console.log("-------------");
                  console.log(ctntotakeout);
                  console.log("-------------");
                  palletnum++;
                  palletval++;
                  palletdetails = palletdetails.concat(temp_details);
                }else if (ctntotakeout < _ctnout1_2 && ctntotakecount == 2) {
                  temp_details = [
                    {Itemnumber : 0,
                    LotCount : 1,
                    PalletNumber : palletnum,
                    CtnPallet : _ctn1_2,
                    InnerCtn : InnerCtn1,
                    PcsInner : PcsInner1_2,
                    InnerCtn2 : InnerCtn2,
                    PcsInner2 : PcsInner2_2,
                    SSVisual : PcsInner1_2+PcsInner2_2,
                    SSApt : PcsInner1_2+PcsInner2_2,
                    AccHoles : accHole,
                    AccNFG : accNAG,
                    AccNAG : accNFG,
                    AccMajor : accMAjor,
                    AccMinor : accMinor}
                  ];
                  tempSS += PcsInner1_2+PcsInner2_2;
                  // ctntotakeout++;
                  ctntotakeout+=_ctn1_2;
                  console.log("-------------");
                  console.log(ctntotakeout);
                  console.log("-------------");
                  palletnum++;
                  palletval++;
                  palletdetails = palletdetails.concat(temp_details);
                }else if (ctntotakeout >= _ctnout1_1 && ctntotakecount == 1){
                  ctntotakeout = 0;
                  ctntotakecount = 2;
                }
              }

//----------------------end loop lot 1 --------------------------
 palletval = 0;
 temp_details =[];
 ctntotakeout = 0;
 ctntotakecount = 1;
 PcsInner1_1 = 0;
 PcsInner2_1 = 0;
 PcsInner1_2 = 0;
 PcsInner2_2 = 0;
 accHole = 0;
 accNFG = 0;
 accNAG = 0;
 accMajor = 0;
 accMinor = 0;
 palletnum = 1;
 tempSS = 0;
 //--------------------loop for lot 2 -------------------------------------

              while (palletval < _pallet2_1) {
                InnerCtn1 = Math.ceil(_ctn2_1/2);
                InnerCtn2 = _ctn2_1 - InnerCtn1;

                PcsInner1_1 = _pcsctn2_1*InnerCtn1;
                if(palletnum == _totalpallet2){
                  PcsInner2_1 = _sampleSize2-PcsInner2_1-tempSS;
                }else{
                  PcsInner2_1 = _pcsctn2_1*InnerCtn2;
                }

                PcsInner1_2 = _pcsctn2_2*InnerCtn1;
                if(palletnum == _totalpallet2){
                  PcsInner2_2 = _sampleSize2-_pcsctn2_2-tempSS;
                }else{
                  PcsInner2_2 = _pcsctn2_2*InnerCtn2;
                }

                temp_ctntotakeout1 = ctntotakeout + InnerCtn1;
                temp_ctntotakeout2 = ctntotakeout + InnerCtn1 + InnerCtn2;

                accHole = acceptanceVal(_sampleSize2,_aqlHole);
                accNAG = acceptanceVal(_sampleSize2,_aqlNFG);
                accNFG = acceptanceVal(_sampleSize2,_aqlNAG);
                accMAjor = acceptanceVal(_sampleSize2,_aqlMajor);
                accMinor = acceptanceVal(_sampleSize2,_aqlMinor);

                if (palletnum == _totalpallet2 && temp_ctntotakeout1 >= _ctnout2_1 && ctntotakecount == 1){
                  temp_details = [
                    {Itemnumber : 0,
                    LotCount : 2,
                    PalletNumber : palletnum,
                    CtnPallet : _ctn2_2,
                    InnerCtn : InnerCtn1,
                    PcsInner : PcsInner1_2,
                    InnerCtn2 : InnerCtn2,
                    PcsInner2 : PcsInner2_2,
                    SSVisual :  PcsInner1_2+PcsInner2_2,
                    SSApt :  PcsInner1_2+PcsInner2_2,
                    AccHoles : accHole,
                    AccNFG : accNAG,
                    AccNAG : accNFG,
                    AccMajor : accMAjor,
                    AccMinor : accMinor}
                  ];
                  tempSS += PcsInner1_2+PcsInner2_2;
                  // ctntotakeout++;
                  ctntotakeout +=_ctn2_1;
                  palletnum++;
                  palletval++;
                  palletdetails = palletdetails.concat(temp_details);
                }else if(ctntotakeout < _ctnout2_1 && ctntotakecount == 1){
                  temp_details = [
                    {Itemnumber : 0,
                    LotCount : 2,
                    PalletNumber : palletnum,
                    CtnPallet : _ctn2_1,
                    InnerCtn : InnerCtn1,
                    PcsInner : PcsInner1_1,
                    InnerCtn2 : InnerCtn2,
                    PcsInner2 : PcsInner2_1,
                    SSVisual : PcsInner1_1+PcsInner2_1,
                    SSApt :  PcsInner1_1+PcsInner2_1,
                    AccHoles : accHole,
                    AccNFG : accNAG,
                    AccNAG : accNFG,
                    AccMajor : accMAjor,
                    AccMinor : accMinor}
                  ];
                  tempSS += PcsInner1_1+PcsInner2_1;
                  ctntotakeout+=_ctn2_1;
                  palletnum++;
                  palletval++;
                  palletdetails = palletdetails.concat(temp_details);
                }else if (ctntotakeout < _ctnout1_2 && ctntotakecount == 2) {
                  temp_details = [
                    {Itemnumber : 0,
                    LotCount : 2,
                    PalletNumber : palletnum,
                    CtnPallet : _ctn2_1,
                    InnerCtn : InnerCtn1,
                    PcsInner : PcsInner1_1,
                    InnerCtn2 : InnerCtn2,
                    PcsInner2 : PcsInner2_1,
                    SSVisual :  PcsInner1_1+PcsInner2_1,
                    SSApt :  PcsInner1_1+PcsInner2_1,
                    AccHoles : accHole,
                    AccNFG : accNAG,
                    AccNAG : accNFG,
                    AccMajor : accMAjor,
                    AccMinor : accMinor}
                  ];
                  tempSS += PcsInner1_2+PcsInner2_2;
                  ctntotakeout+=_ctn2_1;
                  palletnum++;
                  palletval++;
                  palletdetails = palletdetails.concat(temp_details);
                }else if (ctntotakeout == _ctnout2_1 && ctntotakecount == 1){
                  ctntotakeout = 0;
                  ctntotakecount = 2;
                }
              }
              palletval = 0;

              while (palletval < _pallet2_2) {
                InnerCtn1 = Math.ceil(_ctn2_2/2);
                InnerCtn2 = _ctn2_2 - InnerCtn1;

                PcsInner1_1 = _pcsctn2_1*InnerCtn1;
                if(palletnum == _totalpallet1){
                  PcsInner2_1 = _sampleSize2-PcsInner1_1-tempSS;
                }else{
                  PcsInner2_1 = _pcsctn2_1*InnerCtn2;
                }

                PcsInner1_2 = _pcsctn2_2*InnerCtn1;
                if(palletnum == _totalpallet1){
                  PcsInner2_2 = _sampleSize2-PcsInner1_2-tempSS;
                }else{
                  PcsInner2_2 = _pcsctn2_2*InnerCtn2;
                }

                temp_ctntotakeout1 = ctntotakeout + InnerCtn1;
                temp_ctntotakeout2 = ctntotakeout + InnerCtn1 + InnerCtn2;

                if (palletnum == _totalpallet2 && temp_ctntotakeout1 >= _ctnout2_1 && ctntotakecount == 1){
                  temp_details = [
                    {Itemnumber : 0,
                    LotCount : 2,
                    PalletNumber : palletnum,
                    CtnPallet : _ctn2_2,
                    InnerCtn : InnerCtn1,
                    PcsInner : PcsInner1_2,
                    InnerCtn2 : InnerCtn2,
                    PcsInner2 : PcsInner2_2,
                    SSVisual :  PcsInner1_2+PcsInner2_2,
                    SSApt :  PcsInner1_2+PcsInner2_2,
                    AccHoles : accHole,
                    AccNFG : accNAG,
                    AccNAG : accNFG,
                    AccMajor : accMAjor,
                    AccMinor : accMinor}
                  ];
                  tempSS += PcsInner1_2+PcsInner2_2;
                  // ctntotakeout++;
                  ctntotakeout +=_ctn2_2;
                  palletnum++;
                  palletval++;
                  palletdetails = palletdetails.concat(temp_details);
                }else if(ctntotakeout < _ctnout2_1 && ctntotakecount == 1){
                  temp_details = [
                    {Itemnumber : 0,
                    LotCount : 2,
                    PalletNumber : palletnum,
                    CtnPallet : _ctn2_2,
                    InnerCtn : InnerCtn1,
                    PcsInner : PcsInner1_1,
                    InnerCtn2 : InnerCtn2,
                    PcsInner2 : PcsInner2_1,
                    SSVisual :  PcsInner1_1+PcsInner2_1,
                    SSApt :  PcsInner1_1+PcsInner2_1,
                    AccHoles : accHole,
                    AccNFG : accNAG,
                    AccNAG : accNFG,
                    AccMajor : accMAjor,
                    AccMinor : accMinor}
                  ];
                  tempSS += PcsInner1_1+PcsInner2_1;
                  ctntotakeout +=_ctn2_2;
                  palletnum++;
                  palletval++;
                  palletdetails = palletdetails.concat(temp_details);
                }else if (ctntotakeout < _ctnout2_2 && ctntotakecount == 2) {
                  temp_details = [
                    {Itemnumber : 0,
                    LotCount : 2,
                    PalletNumber : palletnum,
                    CtnPallet : _ctn2_2,
                    InnerCtn : InnerCtn1,
                    PcsInner : PcsInner1_2,
                    InnerCtn2 : InnerCtn2,
                    PcsInner2 : PcsInner2_2,
                    SSVisual : PcsInner1_2+PcsInner2_2,
                    SSApt : PcsInner1_2+PcsInner2_2,
                    AccHoles : accHole,
                    AccNFG : accNAG,
                    AccNAG : accNFG,
                    AccMajor : accMAjor,
                    AccMinor : accMinor}
                  ];
                  tempSS += PcsInner1_2+PcsInner2_2;
                  ctntotakeout +=_ctn2_2;
                  palletnum++;
                  palletval++;
                  palletdetails = palletdetails.concat(temp_details);
                }else if (ctntotakeout == _ctnout2_1 && ctntotakecount == 1){
                  ctntotakeout = 0;
                  ctntotakecount = 2;
                }
              }

//----------------------end loop lot 2 --------------------------
palletval = 0;
temp_details =[];
ctntotakeout = 0;
ctntotakecount = 1;
PcsInner1_1 = 0;
PcsInner2_1 = 0;
PcsInner1_2 = 0;
PcsInner2_2 = 0;
accHole = 0;
accNFG = 0;
accNAG = 0;
accMajor = 0;
accMinor = 0;
palletnum = 1;
tempSS = 0;
//--------------------loop for lot 3 -------------------------------------

             while (palletval < _pallet3_1) {
               InnerCtn1 = Math.ceil(_ctn3_1/2);
               InnerCtn2 = _ctn3_1 - InnerCtn1;

               PcsInner1_1 = _pcsctn3_1*InnerCtn1;
               if(palletnum == _totalpallet3){
                 PcsInner2_1 = _sampleSize3-PcsInner2_1-tempSS;
               }else{
                 PcsInner2_1 = _pcsctn3_1*InnerCtn2;
               }

               PcsInner1_2 = _pcsctn3_2*InnerCtn1;
               if(palletnum == _totalpallet3){
                 PcsInner2_2 = _sampleSize3-_pcsctn3_2-tempSS;
               }else{
                 PcsInner2_2 = _pcsctn3_2*InnerCtn2;
               }

               temp_ctntotakeout1 = ctntotakeout + InnerCtn1;
               temp_ctntotakeout2 = ctntotakeout + InnerCtn1 + InnerCtn2;

               accHole = acceptanceVal(_sampleSize3,_aqlHole);
               accNAG = acceptanceVal(_sampleSize3,_aqlNFG);
               accNFG = acceptanceVal(_sampleSize3,_aqlNAG);
               accMAjor = acceptanceVal(_sampleSize3,_aqlMajor);
               accMinor = acceptanceVal(_sampleSize3,_aqlMinor);

               if (palletnum == _totalpallet3 && temp_ctntotakeout1 >= _ctnout3_1 && ctntotakecount == 1){
                 temp_details = [
                   {Itemnumber : 0,
                   LotCount : 3,
                   PalletNumber : palletnum,
                   CtnPallet : _ctn3_2,
                   InnerCtn : InnerCtn1,
                   PcsInner : PcsInner1_2,
                   InnerCtn2 : InnerCtn2,
                   PcsInner2 : PcsInner2_2,
                   SSVisual :  PcsInner1_2+PcsInner2_2,
                   SSApt :  PcsInner1_2+PcsInner2_2,
                   AccHoles : accHole,
                   AccNFG : accNAG,
                   AccNAG : accNFG,
                   AccMajor : accMAjor,
                   AccMinor : accMinor}
                 ];
                 tempSS += PcsInner1_2+PcsInner2_2;
                 // ctntotakeout++;
                 ctntotakeout +=_ctn3_1;
                 palletnum++;
                 palletval++;
                 palletdetails = palletdetails.concat(temp_details);
               }else if(ctntotakeout < _ctnout3_1 && ctntotakecount == 1){
                 temp_details = [
                   {Itemnumber : 0,
                   LotCount : 3,
                   PalletNumber : palletnum,
                   CtnPallet : _ctn3_1,
                   InnerCtn : InnerCtn1,
                   PcsInner : PcsInner1_1,
                   InnerCtn2 : InnerCtn2,
                   PcsInner2 : PcsInner2_1,
                   SSVisual : PcsInner1_1+PcsInner2_1,
                   SSApt :  PcsInner1_1+PcsInner2_1,
                   AccHoles : accHole,
                   AccNFG : accNAG,
                   AccNAG : accNFG,
                   AccMajor : accMAjor,
                   AccMinor : accMinor}
                 ];
                 tempSS += PcsInner1_1+PcsInner2_1;
                 ctntotakeout+=_ctn3_1;
                 palletnum++;
                 palletval++;
                 palletdetails = palletdetails.concat(temp_details);
               }else if (ctntotakeout < _ctnout3_2 && ctntotakecount == 2) {
                 temp_details = [
                   {Itemnumber : 0,
                   LotCount : 3,
                   PalletNumber : palletnum,
                   CtnPallet : _ctn3_1,
                   InnerCtn : InnerCtn1,
                   PcsInner : PcsInner1_2,
                   InnerCtn2 : InnerCtn2,
                   PcsInner2 : PcsInner2_2,
                   SSVisual :  PcsInner1_2+PcsInner2_2,
                   SSApt :  PcsInner1_2+PcsInner2_2,
                   AccHoles : accHole,
                   AccNFG : accNAG,
                   AccNAG : accNFG,
                   AccMajor : accMAjor,
                   AccMinor : accMinor}
                 ];
                 tempSS += PcsInner1_2+PcsInner2_2;
                 ctntotakeout+=_ctn3_1;
                 palletnum++;
                 palletval++;
                 palletdetails = palletdetails.concat(temp_details);
               }else if (ctntotakeout == _ctnout3_1 && ctntotakecount == 1){
                 ctntotakeout = 0;
                 ctntotakecount = 2;
               }
             }
             palletval = 0;

             while (palletval < _pallet3_2) {
               InnerCtn1 = Math.ceil(_ctn3_2/2);
               InnerCtn2 = _ctn3_2 - InnerCtn1;

               PcsInner1_1 = _pcsctn3_1*InnerCtn1;
               if(palletnum == _totalpallet3){
                 PcsInner2_1 = _sampleSize3-PcsInner1_1-tempSS;
               }else{
                 PcsInner2_1 = _pcsctn3_1*InnerCtn2;
               }

               PcsInner1_2 = _pcsctn3_2*InnerCtn1;
               if(palletnum == _totalpallet3){
                 PcsInner2_2 = _sampleSize3-PcsInner1_2-tempSS;
               }else{
                 PcsInner2_2 = _pcsctn3_2*InnerCtn2;
               }

               temp_ctntotakeout1 = ctntotakeout + InnerCtn1;
               temp_ctntotakeout2 = ctntotakeout + InnerCtn1 + InnerCtn2;

               if (palletnum == _totalpallet3 && temp_ctntotakeout1 >= _ctnout3_1 && ctntotakecount == 1){
                 temp_details = [
                   {Itemnumber : 0,
                   LotCount : 3,
                   PalletNumber : palletnum,
                   CtnPallet : _ctn3_2,
                   InnerCtn : InnerCtn1,
                   PcsInner : PcsInner1_2,
                   InnerCtn2 : InnerCtn2,
                   PcsInner2 : PcsInner2_2,
                   SSVisual :  PcsInner1_2+PcsInner2_2,
                   SSApt :  PcsInner1_2+PcsInner2_2,
                   AccHoles : accHole,
                   AccNFG : accNAG,
                   AccNAG : accNFG,
                   AccMajor : accMAjor,
                   AccMinor : accMinor}
                 ];
                 tempSS += PcsInner1_2+PcsInner2_2;
                 // ctntotakeout++;
                 ctntotakeout +=_ctn3_2;
                 palletnum++;
                 palletval++;
                 palletdetails = palletdetails.concat(temp_details);
               }else if(ctntotakeout < _ctnout3_1 && ctntotakecount == 1){
                 temp_details = [
                   {Itemnumber : 0,
                   LotCount : 3,
                   PalletNumber : palletnum,
                   CtnPallet : _ctn3_2,
                   InnerCtn : InnerCtn1,
                   PcsInner : PcsInner1_1,
                   InnerCtn2 : InnerCtn2,
                   PcsInner2 : PcsInner2_1,
                   SSVisual :  PcsInner1_1+PcsInner2_1,
                   SSApt :  PcsInner1_1+PcsInner2_1,
                   AccHoles : accHole,
                   AccNFG : accNAG,
                   AccNAG : accNFG,
                   AccMajor : accMAjor,
                   AccMinor : accMinor}
                 ];
                 tempSS += PcsInner1_1+PcsInner2_1;
                 ctntotakeout +=_ctn3_2;
                 palletnum++;
                 palletval++;
                 palletdetails = palletdetails.concat(temp_details);
               }else if (ctntotakeout < _ctnout3_2 && ctntotakecount == 2) {
                 temp_details = [
                   {Itemnumber : 0,
                   LotCount : 3,
                   PalletNumber : palletnum,
                   CtnPallet : _ctn3_2,
                   InnerCtn : InnerCtn1,
                   PcsInner : PcsInner1_2,
                   InnerCtn2 : InnerCtn2,
                   PcsInner2 : PcsInner2_2,
                   SSVisual : PcsInner1_2+PcsInner2_2,
                   SSApt : PcsInner1_2+PcsInner2_2,
                   AccHoles : accHole,
                   AccNFG : accNAG,
                   AccNAG : accNFG,
                   AccMajor : accMAjor,
                   AccMinor : accMinor}
                 ];
                 tempSS += PcsInner1_2+PcsInner2_2;
                 ctntotakeout +=_ctn3_2;
                 palletnum++;
                 palletval++;
                 palletdetails = palletdetails.concat(temp_details);
               }else if (ctntotakeout == _ctnout3_1 && ctntotakecount == 1){
                 ctntotakeout = 0;
                 ctntotakecount = 2;
               }
             }

//----------------------end loop lot 3 --------------------------
palletval = 0;
temp_details =[];
ctntotakeout = 0;
ctntotakecount = 1;
PcsInner1_1 = 0;
PcsInner2_1 = 0;
PcsInner1_2 = 0;
PcsInner2_2 = 0;
accHole = 0;
accNFG = 0;
accNAG = 0;
accMajor = 0;
accMinor = 0;
palletnum = 1;
tempSS = 0;
//--------------------loop for lot 4 -------------------------------------

             while (palletval < _pallet4_1) {
               InnerCtn1 = Math.ceil(_ctn4_1/2);
               InnerCtn2 = _ctn4_1 - InnerCtn1;

               PcsInner1_1 = _pcsctn4_1*InnerCtn1;
               if(palletnum == _totalpallet4){
                 PcsInner2_1 = _sampleSize4-PcsInner2_1-tempSS;
               }else{
                 PcsInner2_1 = _pcsctn4_1*InnerCtn2;
               }

               PcsInner1_2 = _pcsctn4_2*InnerCtn1;
               if(palletnum == _totalpallet4){
                 PcsInner2_2 = _sampleSize4-_pcsctn4_2-tempSS;
               }else{
                 PcsInner2_2 = _pcsctn4_2*InnerCtn2;
               }

               temp_ctntotakeout1 = ctntotakeout + InnerCtn1;
               temp_ctntotakeout2 = ctntotakeout + InnerCtn1 + InnerCtn2;


               accHole = acceptanceVal(_sampleSize4,_aqlHole);
               accNAG = acceptanceVal(_sampleSize4,_aqlNFG);
               accNFG = acceptanceVal(_sampleSize4,_aqlNAG);
               accMAjor = acceptanceVal(_sampleSize4,_aqlMajor);
               accMinor = acceptanceVal(_sampleSize4,_aqlMinor);

               if (palletnum == _totalpallet4 && temp_ctntotakeout1 >= _ctnout4_1 && ctntotakecount == 1){
                 temp_details = [
                   {Itemnumber : 0,
                   LotCount : 4,
                   PalletNumber : palletnum,
                   CtnPallet : _ctn4_2,
                   InnerCtn : InnerCtn1,
                   PcsInner : PcsInner1_2,
                   InnerCtn2 : InnerCtn2,
                   PcsInner2 : PcsInner2_2,
                   SSVisual :  PcsInner1_2+PcsInner2_2,
                   SSApt :  PcsInner1_2+PcsInner2_2,
                   AccHoles : accHole,
                   AccNFG : accNAG,
                   AccNAG : accNFG,
                   AccMajor : accMAjor,
                   AccMinor : accMinor}
                 ];
                 tempSS += PcsInner1_2+PcsInner2_2;
                 // ctntotakeout++;
                 ctntotakeout +=_ctn4_1;
                 palletnum++;
                 palletval++;
                 palletdetails = palletdetails.concat(temp_details);
               }else if(ctntotakeout < _ctnout4_1 && ctntotakecount == 1){
                 temp_details = [
                   {Itemnumber : 0,
                   LotCount : 4,
                   PalletNumber : palletnum,
                   CtnPallet : _ctn4_1,
                   InnerCtn : InnerCtn1,
                   PcsInner : PcsInner1_1,
                   InnerCtn2 : InnerCtn2,
                   PcsInner2 : PcsInner2_1,
                   SSVisual : PcsInner1_1+PcsInner2_1,
                   SSApt :  PcsInner1_1+PcsInner2_1,
                   AccHoles : accHole,
                   AccNFG : accNAG,
                   AccNAG : accNFG,
                   AccMajor : accMAjor,
                   AccMinor : accMinor}
                 ];
                 tempSS += PcsInner1_1+PcsInner2_1;
                 ctntotakeout+=_ctn4_1;
                 palletnum++;
                 palletval++;
                 palletdetails = palletdetails.concat(temp_details);
               }else if (ctntotakeout < _ctnout4_2 && ctntotakecount == 2) {
                 temp_details = [
                   {Itemnumber : 0,
                   LotCount : 4,
                   PalletNumber : palletnum,
                   CtnPallet : _ctn4_1,
                   InnerCtn : InnerCtn1,
                   PcsInner : PcsInner1_2,
                   InnerCtn2 : InnerCtn2,
                   PcsInner2 : PcsInner2_2,
                   SSVisual :  PcsInner1_2+PcsInner2_2,
                   SSApt :  PcsInner1_2+PcsInner2_2,
                   AccHoles : accHole,
                   AccNFG : accNAG,
                   AccNAG : accNFG,
                   AccMajor : accMAjor,
                   AccMinor : accMinor}
                 ];
                 tempSS += PcsInner1_2+PcsInner2_2;
                 ctntotakeout+=_ctn4_1;
                 palletval++;
                 palletdetails = palletdetails.concat(temp_details);
               }else if (ctntotakeout == _ctnout4_1 && ctntotakecount == 1){
                 ctntotakeout = 0;
                 ctntotakecount = 2;
               }
             }
             palletval = 0;

             while (palletval < _pallet4_2) {
               InnerCtn1 = Math.ceil(_ctn4_2/2);
               InnerCtn2 = _ctn4_2 - InnerCtn1;

               PcsInner1_1 = _pcsctn4_1*InnerCtn1;
               if(palletnum == _totalpallet4){
                 PcsInner2_1 = _sampleSize4-PcsInner1_1-tempSS;
               }else{
                 PcsInner2_1 = _pcsctn4_1*InnerCtn2;
               }

               PcsInner1_2 = _pcsctn4_2*InnerCtn1;
               if(palletnum == _totalpallet4){
                 PcsInner2_2 = _sampleSize4-PcsInner1_2-tempSS;
               }else{
                 PcsInner2_2 = _pcsctn4_2*InnerCtn2;
               }

               temp_ctntotakeout1 = ctntotakeout + InnerCtn1;
               temp_ctntotakeout2 = ctntotakeout + InnerCtn1 + InnerCtn2;

               if (palletnum == _totalpallet4 && temp_ctntotakeout1 >= _ctnout4_1 && ctntotakecount == 1){
                 temp_details = [
                   {Itemnumber : 0,
                   LotCount : 4,
                   PalletNumber : palletnum,
                   CtnPallet : _ctn4_2,
                   InnerCtn : InnerCtn1,
                   PcsInner : PcsInner1_2,
                   InnerCtn2 : InnerCtn2,
                   PcsInner2 : PcsInner2_2,
                   SSVisual :  PcsInner1_2+PcsInner2_2,
                   SSApt :  PcsInner1_2+PcsInner2_2,
                   AccHoles : accHole,
                   AccNFG : accNAG,
                   AccNAG : accNFG,
                   AccMajor : accMAjor,
                   AccMinor : accMinor}
                 ];
                 tempSS += PcsInner1_2+PcsInner2_2;
                 // ctntotakeout++;
                 ctntotakeout +=_ctn4_2;
                 palletnum++;
                 palletval++;
                 palletdetails = palletdetails.concat(temp_details);
               }else if(ctntotakeout < _ctnout4_1 && ctntotakecount == 1){
                 temp_details = [
                   {Itemnumber : 0,
                   LotCount : 4,
                   PalletNumber : palletnum,
                   CtnPallet : _ctn4_2,
                   InnerCtn : InnerCtn1,
                   PcsInner : PcsInner1_1,
                   InnerCtn2 : InnerCtn2,
                   PcsInner2 : PcsInner2_1,
                   SSVisual :  PcsInner1_1+PcsInner2_1,
                   SSApt :  PcsInner1_1+PcsInner2_1,
                   AccHoles : accHole,
                   AccNFG : accNAG,
                   AccNAG : accNFG,
                   AccMajor : accMAjor,
                   AccMinor : accMinor}
                 ];
                 tempSS += PcsInner1_1+PcsInner2_1;
                 ctntotakeout +=_ctn4_2;
                 palletnum++;
                 palletval++;
                 palletdetails = palletdetails.concat(temp_details);
               }else if (ctntotakeout < _ctnout4_2 && ctntotakecount == 2) {
                 temp_details = [
                   {Itemnumber : 0,
                   LotCount : 4,
                   PalletNumber : palletnum,
                   CtnPallet : _ctn4_2,
                   InnerCtn : InnerCtn1,
                   PcsInner : PcsInner1_2,
                   InnerCtn2 : InnerCtn2,
                   PcsInner2 : PcsInner2_2,
                   SSVisual : PcsInner1_2+PcsInner2_2,
                   SSApt : PcsInner1_2+PcsInner2_2,
                   AccHoles : accHole,
                   AccNFG : accNAG,
                   AccNAG : accNFG,
                   AccMajor : accMAjor,
                   AccMinor : accMinor}
                 ];
                 tempSS += PcsInner1_2+PcsInner2_2;
                 ctntotakeout +=_ctn4_2;
                 palletnum++;
                 palletval++;
                 palletdetails = palletdetails.concat(temp_details);
               }else if (ctntotakeout == _ctnout4_1 && ctntotakecount == 1){
                 ctntotakeout = 0;
                 ctntotakecount = 2;
               }
             }

//----------------------end loop lot 4 --------------------------
palletval = 0;
temp_details =[];
ctntotakeout = 0;
ctntotakecount = 1;
PcsInner1_1 = 0;
PcsInner2_1 = 0;
PcsInner1_2 = 0;
PcsInner2_2 = 0;
accHole = 0;
accNFG = 0;
accNAG = 0;
accMajor = 0;
accMinor = 0;
palletnum = 1;
tempSS = 0;
//--------------------loop for lot 5 -------------------------------------

             while (palletval < _pallet5_1) {
               InnerCtn1 = Math.ceil(_ctn5_1/2);
               InnerCtn2 = _ctn5_1 - InnerCtn1;

               PcsInner1_1 = _pcsctn5_1*InnerCtn1;
               if(palletnum == _totalpallet5){
                 PcsInner2_1 = _sampleSize5-PcsInner2_1-tempSS;
               }else{
                 PcsInner2_1 = _pcsctn5_1*InnerCtn2;
               }

               PcsInner1_2 = _pcsctn5_2*InnerCtn1;
               if(palletnum == _totalpallet5){
                 PcsInner2_2 = _sampleSize5-_pcsctn5_2-tempSS;
               }else{
                 PcsInner2_2 = _pcsctn5_2*InnerCtn2;
               }

               temp_ctntotakeout1 = ctntotakeout + InnerCtn1;
               temp_ctntotakeout2 = ctntotakeout + InnerCtn1 + InnerCtn2;


               accHole = acceptanceVal(_sampleSize5,_aqlHole);
               accNAG = acceptanceVal(_sampleSize5,_aqlNFG);
               accNFG = acceptanceVal(_sampleSize5,_aqlNAG);
               accMAjor = acceptanceVal(_sampleSize5,_aqlMajor);
               accMinor = acceptanceVal(_sampleSize5,_aqlMinor);

               if (palletnum == _totalpallet5 && temp_ctntotakeout1 >= _ctnout5_1 && ctntotakecount == 1){
                 temp_details = [
                   {Itemnumber : 0,
                   LotCount : 5,
                   PalletNumber : palletnum,
                   CtnPallet : _ctn5_2,
                   InnerCtn : InnerCtn1,
                   PcsInner : PcsInner1_2,
                   InnerCtn2 : InnerCtn2,
                   PcsInner2 : PcsInner2_2,
                   SSVisual :  PcsInner1_2+PcsInner2_2,
                   SSApt :  PcsInner1_2+PcsInner2_2,
                   AccHoles : accHole,
                   AccNFG : accNAG,
                   AccNAG : accNFG,
                   AccMajor : accMAjor,
                   AccMinor : accMinor}
                 ];
                 tempSS += PcsInner1_2+PcsInner2_2;
                 // ctntotakeout++;
                 ctntotakeout +=_ctn5_1;
                 palletnum++;
                 palletval++;
                 palletdetails = palletdetails.concat(temp_details);
               }else if(ctntotakeout < _ctnout5_1 && ctntotakecount == 1){
                 temp_details = [
                   {Itemnumber : 0,
                   LotCount : 5,
                   PalletNumber : palletnum,
                   CtnPallet : _ctn5_1,
                   InnerCtn : InnerCtn1,
                   PcsInner : PcsInner1_1,
                   InnerCtn2 : InnerCtn2,
                   PcsInner2 : PcsInner2_1,
                   SSVisual : PcsInner1_1+PcsInner2_1,
                   SSApt :  PcsInner1_1+PcsInner2_1,
                   AccHoles : accHole,
                   AccNFG : accNAG,
                   AccNAG : accNFG,
                   AccMajor : accMAjor,
                   AccMinor : accMinor}
                 ];
                 tempSS += PcsInner1_1+PcsInner2_1;
                 ctntotakeout+=_ctn4_1;
                 palletnum++;
                 palletval++;
                 palletdetails = palletdetails.concat(temp_details);
               }else if (ctntotakeout < _ctnout5_2 && ctntotakecount == 2) {
                 temp_details = [
                   {Itemnumber : 0,
                   LotCount : 5,
                   PalletNumber : palletnum,
                   CtnPallet : _ctn5_1,
                   InnerCtn : InnerCtn1,
                   PcsInner : PcsInner1_2,
                   InnerCtn2 : InnerCtn2,
                   PcsInner2 : PcsInner2_2,
                   SSVisual :  PcsInner1_2+PcsInner2_2,
                   SSApt :  PcsInner1_2+PcsInner2_2,
                   AccHoles : accHole,
                   AccNFG : accNAG,
                   AccNAG : accNFG,
                   AccMajor : accMAjor,
                   AccMinor : accMinor}
                 ];
                 tempSS += PcsInner1_2+PcsInner2_2;
                 ctntotakeout+=_ctn5_1;
                 palletnum++;
                 palletval++;
                 palletdetails = palletdetails.concat(temp_details);
               }else if (ctntotakeout == _ctnout5_1 && ctntotakecount == 1){
                 ctntotakeout = 0;
                 ctntotakecount = 2;
               }
             }
             palletval = 0;

             while (palletval < _pallet5_2) {
               InnerCtn1 = Math.ceil(_ctn5_2/2);
               InnerCtn2 = _ctn5_2 - InnerCtn1;

               PcsInner1_1 = _pcsctn5_1*InnerCtn1;
               if(palletnum == _totalpallet5){
                 PcsInner2_1 = _sampleSize5-PcsInner1_1-tempSS;
               }else{
                 PcsInner2_1 = _pcsctn5_1*InnerCtn2;
               }

               PcsInner1_2 = _pcsctn5_2*InnerCtn1;
               if(palletnum == _totalpallet5){
                 PcsInner2_2 = _sampleSize5-PcsInner1_2-tempSS;
               }else{
                 PcsInner2_2 = _pcsctn5_2*InnerCtn2;
               }

               temp_ctntotakeout1 = ctntotakeout + InnerCtn1;
               temp_ctntotakeout2 = ctntotakeout + InnerCtn1 + InnerCtn2

               if (palletnum == _totalpallet5 && temp_ctntotakeout1 >= _ctnout5_1 && ctntotakecount == 1){
                 temp_details = [
                   {Itemnumber : 0,
                   LotCount : 5,
                   PalletNumber : palletnum,
                   CtnPallet : _ctn5_2,
                   InnerCtn : InnerCtn1,
                   PcsInner : PcsInner1_2,
                   InnerCtn2 : InnerCtn2,
                   PcsInner2 : PcsInner2_2,
                   SSVisual :  PcsInner1_2+PcsInner2_2,
                   SSApt :  PcsInner1_2+PcsInner2_2,
                   AccHoles : accHole,
                   AccNFG : accNAG,
                   AccNAG : accNFG,
                   AccMajor : accMAjor,
                   AccMinor : accMinor}
                 ];
                 tempSS += PcsInner1_2+PcsInner2_2;
                 // ctntotakeout++;
                 ctntotakeout +=_ctn5_2;
                 palletnum++;
                 palletval++;
                 palletdetails = palletdetails.concat(temp_details);
               }else if(ctntotakeout < _ctnout5_1 && ctntotakecount == 1){
                 temp_details = [
                   {Itemnumber : 0,
                   LotCount : 5,
                   PalletNumber : palletnum,
                   CtnPallet : _ctn5_2,
                   InnerCtn : InnerCtn1,
                   PcsInner : PcsInner1_1,
                   InnerCtn2 : InnerCtn2,
                   PcsInner2 : PcsInner2_1,
                   SSVisual :  PcsInner1_1+PcsInner2_1,
                   SSApt :  PcsInner1_1+PcsInner2_1,
                   AccHoles : accHole,
                   AccNFG : accNAG,
                   AccNAG : accNFG,
                   AccMajor : accMAjor,
                   AccMinor : accMinor}
                 ];
                 tempSS += PcsInner1_1+PcsInner2_1;
                 ctntotakeout +=_ctn5_2;
                 palletnum++;
                 palletval++;
                 palletdetails = palletdetails.concat(temp_details);
               }else if (ctntotakeout < _ctnout5_2 && ctntotakecount == 2) {
                 temp_details = [
                   {Itemnumber : 0,
                   LotCount : 5,
                   PalletNumber : palletnum,
                   CtnPallet : _ctn5_2,
                   InnerCtn : InnerCtn1,
                   PcsInner : PcsInner1_2,
                   InnerCtn2 : InnerCtn2,
                   PcsInner2 : PcsInner2_2,
                   SSVisual : PcsInner1_2+PcsInner2_2,
                   SSApt : PcsInner1_2+PcsInner2_2,
                   AccHoles : accHole,
                   AccNFG : accNAG,
                   AccNAG : accNFG,
                   AccMajor : accMAjor,
                   AccMinor : accMinor}
                 ];
                 tempSS += PcsInner1_2+PcsInner2_2;
                 ctntotakeout +=_ctn5_2;
                 palletnum++;
                 palletval++;
                 palletdetails = palletdetails.concat(temp_details);
               }else if (ctntotakeout == _ctnout5_1 && ctntotakecount == 1){
                 ctntotakeout = 0;
                 ctntotakecount = 2;
               }
             }

//----------------------end loop lot 5 --------------------------
          console.table(palletdetails);

          palletdetails.forEach((palletdetail, index) => {
            // console.table(palletdetail);
            newrow(palletdetail,list);
          });

        }






        $("#SONumber").keyup(function(){

          var SONumber = $(this).val().trim();
          if(SONumber != ''){

            $("#checkk").show();



                if(SONumber.match(/\d/g).length === 10){
                  $("#checkk").html("<span style='color:green;'>Good</span>");
                  //$("#BatchNumber").val("");
                }else{
                  $("#checkk").html("<span style='color:red;'>Must be 10 digit</span>");
                }

          }else{
            $("#checkk").hide();
          }
        });


        $(".gloveSizePrimary").change(function() {
          //console.log(list);
          _selectedSize = $(".gloveSizePrimary").val();
          for (var i = 1; i <= list; i++) {
          //  console.log(i);
            sizeNew = ".sizeRow"+i;
            //console.log(sizeNew);
            //console.log(_selectedSize);
            if($(sizeNew).val() == ''){
              $(sizeNew).val(_selectedSize);
            }
          }
        });

          $(document).on('click', '.add', function(){
            temp_details = {
              Itemnumber : 0,
              LotCount : 0,
              PalletNumber : list+1,
              CtnPallet : 0,
              InnerCtn : 0,
              PcsInner : 0,
              InnerCtn2 : 0,
              PcsInner2 : 0,
              SSVisual : 0,
              SSApt : 0,
              AccHoles : 0,
              AccNFG : 0,
              AccNAG : 0,
              AccMajor : 0,
              AccMinor : 0
            };
            console.log(temp_details);
            newrow(temp_details, list);
          });


          function newrow(detail,ind){
            // console.log(detail);
            // console.log("itemnumber: "+ detail.Itemnumber);
            _selectedSize = $(".gloveSizePrimary").val();
            if (list < 30){
              ind++;
              list = ind;
              // console.log(list);
              var html = '';
              html += '<tr>';
              html += '<td width="250px"><select name="GloveSizeKey[]" class="form-control gloveSizeSub sizeRow'+ind+'" required><option value="">Size</option><?php echo size_selection($connect,$M_GloveSize); ?></select></td>';
              html += '<td width="250px"><input type="number" oninput="this.value=this.value.slice(0,this.maxLength); this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null;" maxlength = "5" name="itemnumber[]" class="form-control itemnumber'+ind+'" placeholder="Enter Item Number" value="'+detail.Itemnumber+'" required></td>';
              html += '<td width="250px"><input type="number" oninput="this.value=this.value.slice(0,this.maxLength); this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null;" maxlength = "5" name="lotcount[]" class="form-control lotcount'+ind+'" placeholder="Lot Count" value="'+detail.LotCount+'" required></td>';
              html += '<td width="250px"><input type="number" oninput="this.value=this.value.slice(0,this.maxLength); this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null;" maxlength = "5" name="palletNumber[]" class="form-control palletNumber'+ind+'" placeholder="Pallet Number" value="'+ind+'"></td>';
              html += '<td width="250px"><input type="number" oninput="this.value=this.value.slice(0,this.maxLength); this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null;" maxlength = "5" name="ctnpallet[]" class="form-control ctnpallet'+ind+'" placeholder="0" value="'+detail.CtnPallet+'" required></td>';
              html += '<td width="250px"><input type="number" oninput="this.value=this.value.slice(0,this.maxLength); this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null;" maxlength = "5" name="innerctn[]" class="form-control innnerctn'+ind+'" placeholder="0" value="'+detail.InnerCtn+'" required></td>';
              html += '<td width="250px"><input type="number" oninput="this.value=this.value.slice(0,this.maxLength); this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null;" maxlength = "5" name="pcsinner[]" class="form-control pcsinner'+ind+'" placeholder="0" value="'+detail.PcsInner+'" required></td>';
              html += '<td width="250px"><input type="number" oninput="this.value=this.value.slice(0,this.maxLength); this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null;" maxlength = "5" name="innerctn2[]" class="form-control innerctn2'+ind+'" placeholder="0" value="'+detail.InnerCtn2+'" required></td>';
              html += '<td width="250px"><input type="number" oninput="this.value=this.value.slice(0,this.maxLength); this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null;" maxlength = "5" name="pcsinner2[]" class="form-control pcsinner2'+ind+'" placeholder="0" value="'+detail.PcsInner2+'" required></td>';
              html += '<td width="250px"><input type="number" oninput="this.value=this.value.slice(0,this.maxLength); this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null;" maxlength = "5" name="visual[]" class="form-control sample'+ind+'" placeholder="SS Visual" value="'+detail.SSVisual+'" required></td>';
              html += '<td width="250px"><input type="number" oninput="this.value=this.value.slice(0,this.maxLength); this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null;" maxlength = "5" name="sample[]" class="form-control sample'+ind+'" placeholder="APT/WTT" value="'+detail.SSApt+'" required></td>';
              html += '<td width="250px"><input type="number" oninput="this.value=this.value.slice(0,this.maxLength); this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null;" maxlength = "5" name="accFFH[]" class="form-control accFFH'+ind+'" placeholder="Acc FFH" value="'+detail.AccHoles+'" required></td>';
              html += '<td width="250px"><input type="number" oninput="this.value=this.value.slice(0,this.maxLength); this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null;" maxlength = "5" name="accNFG[]" class="form-control accNFG'+ind+'" placeholder="Acc Critical NFG" value="'+detail.AccNFG+'" required></td>';
              html += '<td width="250px"><input type="number" oninput="this.value=this.value.slice(0,this.maxLength); this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null;" maxlength = "5" name="accNAG[]" class="form-control accNAG'+ind+'" placeholder="Acc Critical NAG" value="'+detail.AccNAG+'" required></td>';
              html += '<td width="250px"><input type="number" oninput="this.value=this.value.slice(0,this.maxLength); this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null;" maxlength = "5" name="accMajor[]" class="form-control accMajor'+ind+'" placeholder="Acc Major" value="'+detail.AccMajor+'"  required></td>';
              html += '<td width="250px"><input type="number" oninput="this.value=this.value.slice(0,this.maxLength); this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null;" maxlength = "5" name="accMinor[]" class="form-control accMinor'+ind+'" placeholder="Acc Minor" value="'+detail.AccMinor+'" required></td>';

              if (ind == 1){
                html += '<td></td></tr>';
              }else {
                html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><span class="glyphicon glyphicon-minus"></span></button></td></tr>';

              }
              $('#item_table').append(html);
              //console.log(_selectedSize);
              sizeRow = ".sizeRow"+ind;
              // alert(sizeRow);
              if(_selectedSize != ''){
                $(sizeRow).val(_selectedSize);
              }
            }else{
              alert("reached maximum number of pallets");
            }

          }

          $(document).on('click', '.remove', function(){
            list -- ;
              $(this).closest('tr').remove();
          });
        </script>
