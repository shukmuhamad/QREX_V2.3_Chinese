$('.decimal').keypress(function(evt){
  return (/^[0-9]*\.?[0-9]*$/).test($(this).val()+evt.key);
});

// Sum Defect Values
$(function(){
    // Sum Total Defect Value
    $().mask('#,###.##',{reverse : true});

    var total_defect=function(){
        var sum=0;
        var samplesizeapt = parseInt($("input[name='sample_size_apt']").val());
        var samplesizevt = parseInt($("input[name='sample_size_vt']").val());
        var totalminor = parseInt($("input[name='total_minor']").val());
        var totalmajor = parseInt($("input[name='total_major']").val());
        var totalnag = parseInt($("input[name='total_nag']").val());
        var totalnfg = parseInt($("input[name='total_nfg']").val());
        var totalhole1 = parseInt($("input[name='total_holes1']").val());
        var totalhole2 = parseInt($("input[name='total_holes2']").val());
        var totalgoodglove = parseInt($("input[name='total_goodglove']").val());
        sum = totalminor + totalmajor + totalnag + totalnfg + totalhole1 + totalhole2;
        barrier = totalnfg + totalhole1 + totalhole2;
        console.log('vt: '+samplesizevt);
            console.log('apt: '+samplesizeapt);
            console.log('sum: '+sum);
        if(sum <= samplesizeapt ) {

          $('#total_defect').val(sum);
          $('#total_barrier').val(barrier);

        } else {
            $('.amount').each(function(){
                $(this).val('');
            });

            $('.amount2').each(function(){
                $(this).val('');
            });

            $('.amount3').each(function(){
                $(this).val('');
            });

            $('.amount4').each(function(){
                $(this).val('');
            });

            $('.amount5').each(function(){
                $(this).val('');
            });

            $('.amount6').each(function(){
                $(this).val('');
            });
            $('.amount7').each(function(){
                $(this).val('');
            });


            $('#total_minor').val(0);
            $('#total_major').val(0);
            $('#total_nag').val(0);
            $('#total_nfg').val(0);
            $('#total_holes1').val(0);
            $('#total_holes2').val(0);
            $('#total_defect').val(0);
            $('#total_goodglove').val(0);
            //$('.defect-btn').attr('disabled', true);

            $("#errorModal").modal();
            console.log(sum);
            console.log($('#sample_size_apt').val());
        }
        ;
    }

    // Sum Total Minor
    $().mask('#,###.##',{reverse : true});

    var total_minor=function(){
        var sum=0;
        $('.amount').each(function(){
            var num =$(this).val().replace(',', '');

            if(num != 0){
                sum+=parseInt(num);
            }
        });
        $('#total_minor').val(sum);
    }

    $('.amount').keyup(function(){
      
        total_minor();
        total_defect();
    });

    // Sum Total Major
    $().mask('#,###.##',{reverse : true});

    var total_major=function(){
        var sum=0;
        $('.amount2').each(function(){
                var num =$(this).val().replace(',','');
                if(num !=0){
                    sum+=parseInt(num);
                }
        });
        $('#total_major').val(sum);
    }

    $('.amount2').keyup(function(){
        total_major();
        total_defect();
    });

    // Sum Total Critical
    $().mask('#,###.##',{reverse : true});

    var total_nag=function(){
        var sum=0;
        $('.amount3').each(function(){
            var num =$(this).val().replace(',','');
            if(num !=0){
                sum+=parseInt(num);
            }
        });
        $('#total_nag').val(sum);
    }

    $('.amount3').keyup(function(){
        total_nag();
        total_defect();
    });

    // Sum Total Holes 1
    $().mask('#,###.##',{reverse : true});

    var total_nfg=function(){
        var sum=0;
        $('.amount4').each(function(){
            var num =$(this).val().replace(',','');
            if(num !=0){
                sum+=parseInt(num);
            }
        });
        $('#total_nfg').val(sum);
    }
    $('.amount4').keyup(function(){
        total_nfg();
        total_defect();
    });

    // Sum Total Holes 2
    $().mask('#,###.##',{reverse : true});

    var total_holes1=function(){
        var sum=0;
        $('.amount5').each(function(){
            var num =$(this).val().replace(',','');
            if(num !=0){
                sum+=parseInt(num);
            }
        });
        $('#total_holes1').val(sum);
    }
    $('.amount5').keyup(function(){
        total_holes1();
        total_defect();
    });

    // Sum Total Holes 3
    $().mask('#,###.##',{reverse : true});
        var total_holes2=function(){
        var sum=0;
        $('.amount6').each(function(){
            var num =$(this).val().replace(',','');
            if(num !=0){
                sum+=parseInt(num);
            }
        });
        $('#total_holes2').val(sum);
    }
    $('.amount6').keyup(function(){
        total_holes2();
        total_defect();
    });

    $().mask('#,###.##',{reverse : true});
        var total_goodglove=function(){
        var sum=0;
        $('.amount7').each(function(){
            var num =$(this).val().replace(',','');
            if(num !=0){
                sum+=parseInt(num);
            }
        });
        $('#total_goodglove').val(sum);
        console.log('gg = '+sum);
    }
    $('.amount7').keyup(function(){
        total_goodglove();
        total_defect();
    });
});
