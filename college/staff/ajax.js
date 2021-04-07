 <script type="text/javascript">
          $(document).ready(function () {
            showGraph();
        });

               function showGraph()
               {
                   {
                       $.post("viewdata.php",
                       function (data)
                       {
                           console.log(data);
                            var name = [];
                           var marks = [];
         
                           for (var i in data) {
                               name.push(data[i].name);
                               marks.push(data[i].students);
                           }
         
                           var chartdata = {
                               labels: name,
                               datasets: [
                                   {
                                       label: 'Students',
                                       backgroundColor: '#49e2ff',
                                       borderColor: '#46d5f1',
                                       hoverBackgroundColor: '#CCCCCC',
                                       hoverBorderColor: '#666666',
                                       data: marks,
                                       
                                   }
                               ]
         
         
                           };
         
         
         
                           var graphTarget = $("#graphCanvas");
         
                           var barGraph = new Chart(graphTarget, {
                               type: 'bar',
                               data: chartdata
                           });
                       });
                   }
               }
         
         $("body").on("click", "#btnExport", function () {
                   html2canvas($('#exportTable')[0], {
                       onrendered: function (canvas) {
                           var data = canvas.toDataURL();
                           var docDefinition = {
                               content: [{
                                   image: data,
                                   width: 500
                               }]
                           };
                           pdfMake.createPdf(docDefinition).download("students.pdf");
                       }
                   });
               });
         
         
         
         function fnExcelReport(){///generating excell
           var tab_text="<table border='2px'><tr >";
           var textRange; var j=0;
           tab = document.getElementById('exportTable'); // id of table
         
           for(j = 0 ; j < tab.rows.length ; j++) 
           {     
               tab_text=tab_text+tab.rows[j].innerHTML+"</tr>";
               //tab_text=tab_text+"</tr>";
           }
         
           tab_text=tab_text+"</table>";
           tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
           tab_text= tab_text.replace(/<img[^>]*>/gi,""); // remove if u want images in your table
           tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params
         
           var ua = window.navigator.userAgent;
           var msie = ua.indexOf("MSIE "); 
         
           if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
           {
               txtArea1.document.open("txt/html","replace");
               txtArea1.document.write(tab_text);
               txtArea1.document.close();
               txtArea1.focus(); 
               sa=txtArea1.document.execCommand("SaveAs",true,"Say Thanks to Sumit.xls");
           }  
           else                //other browser not tested on IE 11
               sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));  
         
           return (sa);
         }
         
         $(document).on('change', '.departmentFilter', function(){
         $('.forIntake').hide();//intake filter hide
          if($(this).val() !=''){
            var val = $(this).val();
            var action="departmentFiltering";
            $.ajax({
                      url:'fetchStudents.php',
                      method:"POST",
                      data:{ val:val, action: action},
                      success:function(data){
                        $("#contentBox").html(data);
                      }
                     })
         
          }else{
         
            alert("Please select a valid department");
          }
          
         });
         
      
         


          $(document).on('change', '.courseFilter', function(){
         
          if($(this).val() !=''){
            var val = $(this).val();
            var action="courseFiltering";
            $.ajax({
                      url:'fetchStudents.php',
                      method:"POST",
                      data:{ val:val, action: action},
                      success:function(data){
                        $("#contentBox").html(data);
                        var pagination = [data];
                        $('.forIntake').show();//intake filter show
                      }
                     })
         
          }else{
         
            alert("Please select a valid course");
          }
          
         });

         $(document).on('change', '.intakeFilter', function(){//fetch per intake
         
          if($(this).val() !=''){
            var intake = $(this).val();
            var action="intake";
            var courseIt = $('.courseFilter').val();
           //alert(courseIt);
            $.ajax({
                      url:'fetchStudents.php',
                      method:"POST",
                      data:{ intake:intake, courseIt:courseIt,action: action},
                      success:function(data){
                        $("#contentBox").html(data);
                        var pagination = [data];
                      }
                     })
         
          }else{
         
            alert("Please select a valid intake");
          }
          
         });
         
  

           $(document).ready(function(){
           $("select.filter").change(function(){
               var selected = $(".filter option:selected").val();
               var action = "getFiltered";
         
               $.ajax({
                   type: "POST",
                   url: "fetchStudents.php",
                   data: { selected : selected, action : action } 
               }).done(function(data){
                   $("#filtered").html(data);
                   var pagination = [data];
               });
           });
         });



      
         fetchAll();
               function fetchAll(){
               var action = "fetchAll";
               $.ajax({
                       type:"POST",
                       url:"fetchStudents.php",
                       data:{action:action},
                       success:function(data){
                         $('#contentBox').html(data);
                         var pagination = [data];
                       }
                     });
             }
      </script>