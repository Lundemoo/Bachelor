/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */






if ($(".timepicker")[0]){
        var $input = $( '.timepicker' ).pickatime({

        })
        var picker = $input.pickatime('picker')

        picker.set();
       // picker.open()
       }
       
       
       
       if ($(".datepicker")[0]){
var dt = new Date();

dt.getFullYear() + "/" + (dt.getMonth() + 1) + "/" + dt.getDate();

        var $input = $( '.datepicker' ).pickadate({
            formatSubmit: 'yyyy/mm/dd',
             min: [dt.getFullYear(), dt.getMonth(), dt.getDate()],
            container: '#container',
            // editable: true,
            closeOnSelect: true,
            closeOnClear: false,
        })

        var picker = $input.pickadate('picker')
         picker.set('select', '')
        // picker.open()

        // $('button').on('click', function() {
        //     picker.set('disable', true);
        // });
        }