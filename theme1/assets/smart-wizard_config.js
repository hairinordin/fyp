    $(document).ready(function(){
            var method = document.getElementById('method');
            var isDisabled = $("input[name='date_implement#1']").prop('disabled');
            // Toolbar extra buttons
            
//            if(isDisabled){
//                var btnDoeFinish = $('<button></button>').text('Submit score')
//                                             .addClass('btn btn-info')
//                                             .attr("id", "submit_btn")
//                                             .addClass('btn-finish')
//                                             .prop("disabled", true)
//                                             .on('click', function(){
//                                                    if( !$(this).hasClass('disabled')){
//                                                        var elmForm = $("#myForm");
//                                                        if(elmForm){
//                                                            elmForm.validator('validate');
//                                                            var elmErr = elmForm.find('.has-error');
//                                                            
//                                                            //return true;
//                                                            if(elmErr && elmErr.length > 0){
//                                                                alert('Oops we still have error in the form');
//                                                                
//                                                                return false;
//                                                            }else{
//                                                                alert('Great! we are ready to submit form');
//                                                                elmForm.submit();
//                                                                return false;
//                                                            } // temporary disable
//                                                            elmForm.submit();
//                                                        }
//                                                    }
//                                                });
//                var btnFinish = $('<button></button>').text('Submit')
//                                             .addClass('btn btn-info')
//                                             .addClass('btn-finish')
//                                             .prop("disabled", true)
//                                             .on('click', function(){
//                                                    if( !$(this).hasClass('disabled')){
//                                                        var elmForm = $("#myForm");
//                                                        if(elmForm){
//                                                            elmForm.validator('validate');
//                                                            var elmErr = elmForm.find('.has-error');
//                                                            
//                                                            //return true;
//                                                            if(elmErr && elmErr.length > 0){
//                                                                alert('Oops we still have error in the form');
//                                                                
//                                                                return false;
//                                                            }else{
//                                                                alert('Great! we are ready to submit form');
//                                                                
//                                                               
//                                                                
//                                                                //return false;
//                                                            } // temporary disable
//                                                            //elmForm.submit();
//                                                        }
//                                                    }
//                                                });
//            var btnCancel = $('<button></button>').text('Reset')
//                                             .addClass('btn btn-warning')
//                                             .prop("disabled", true)
//                                             .on('click', function(){
//                                                    $('#smartwizard').smartWizard("reset");
//                                                    $('#myForm').find("input, textarea").val("");
//                                                    $('#myForm').find(':radio').checked = false;
//                                                   
//                                                     
//                                                    
//                                                    //location.reload();
//                                                });
//
//           var btnSave = $('<button></button>').text('Save as draft and exit')
//                                             .attr("id", "save_btn")
//                                             .val('save')
//                                             .addClass('btn btn-success')
//                                             .prop("disabled", true)
//                                             .on('click', function(){
//                                                    //$('#smartwizard').smartWizard("reset");
//                                                    //$('#myForm').find("input, textarea").val("");
//                                                     method.value = "save";
//                                                });
//            var btnUpdate = $('<button></button>').text('Update')
//                                             .addClass('btn btn-warning')
//                                             .prop("disabled", true)
//                                             .on('click', function(){
//                                                    $('#smartwizard').smartWizard("reset");
//                                                    $('#myForm').find("input, textarea").val("");
//                                                }); 
//            } else {
                var btnDoeFinish = $('<button></button>').text('Submit score')
                                             .addClass('btn btn-info')
                                            .attr("id", "submit_btn")
                                            .val('submit')
                                             .addClass('btn-finish')
                                             .prop("disabled", true)
                                             .on('click', function(){
                                                    if( !$(this).hasClass('disabled')){
                                                        var elmForm = $("#myForm");
                                                        if(elmForm){
                                                            elmForm.validator('validate');
                                                            var elmErr = elmForm.find('.has-error');
                                                            
                                                            //return true;
                                                            if(elmErr && elmErr.length > 0){
                                                                alert('Oops we still have error in the form');
                                                                
                                                                return false;
                                                            }else{
                                                                alert('Great! we are ready to submit form');
                                                                elmForm.submit();
                                                                return false;
                                                            } // temporary disable
                                                            elmForm.submit();
                                                        }
                                                    }
                                                });
                var btnFinish = $('<button></button>').text('Submit')
                                             .attr("id", "submit_btn")
                                             .val('submit')
                                             .addClass('btn btn-info')
                                             .addClass('btn-finish')
                                             .prop("disabled", true)
                                             .on('click', function(){
                                                    if( !$(this).hasClass('disabled')){
                                                        var elmForm = $("#myForm");
                                                        if(elmForm){
                                                            //elmForm.validator('validate');
                                                            //var elmErr = elmForm.find('.has-error');
                                                            
                                                            
                                                            //return true;
//                                                            if(elmErr && elmErr.length > 0){
//                                                                alert('Oops we still have error in the form');
//                                                                
//                                                                return false;
//                                                            }else{
//                                                                alert('Great! we are ready to submit form');
//                                                                elmForm.submit();
//                                                                return false;
//                                                            } // temporary disable
                                                            //elmForm.submit();
                                                        }
                                                    }
                                                });
//            var btnCancel = $('<button></button>').text('Reset')
//                                             .addClass('btn btn-warning')
//                                             .on('click', function(){
//                                                    $('#smartwizard').smartWizard("reset");
//                                                    $('#myForm').find("input, textarea").val("");
//                                                    $('#myForm').find(':radio').checked = false;
                                                   
                                                     
                                                    
                                                    //location.reload();
//                                                });

           var btnSave = $('<button></button>').text('Save as draft and exit')
                                             .attr("id", "save_btn")
                                             .val('save')
                                             .addClass('btn btn-success')
                                             .on('click', function(){
                                                    //$('#smartwizard').smartWizard("reset");
                                                    //$('#myForm').find("input, textarea").val("");
                                                    //$('#save_btn').html('Loading./.');
                                                    
                                                    //$('#loading-indicator').show();
                                                    //alert('Click Wizard');
                                                     method.value = "save";
                                                });
//            var btnUpdate = $('<button></button>').text('Update')
//                                             .addClass('btn btn-warning')
//                                             .on('click', function(){
//                                                    $('#smartwizard').smartWizard("reset");
//                                                    $('#myForm').find("input, textarea").val("");
//                                                }); 
                                                
            var btnExit = $('<button></button>').text('Exit')
                                             .addClass('btn btn-warning')
                                             .on('click', function(){
                                                method.value = "exit";
                                        
                                                if(confirm('Do you want to exit?')){
                                                    var dashboard_url = 'https://emains.doe.gov.my/dashboard/company';
                                                    window.location.href =  dashboard_url;
                                               
                                                }
                                                
                                                }); 
            //}
            

            // Smart Wizard
// Smart Wizard
            $('#smartwizard').smartWizard({
                    selected: 0,
                    theme: 'dots',
                    transitionEffect:'fade',
                    keyNavigation:'false',
                    toolbarSettings: {toolbarPosition: 'both',
                                      toolbarButtonPosition: 'right', // left, right
                                      toolbarExtraButtons: [ btnSave, btnFinish]
                                    },
                    anchorSettings: {
                                markDoneStep: true, // add done css
                                markAllPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
                                removeDoneStepOnNavigateBack: true, // While navigate back done step after active step will be cleared
                                enableAnchorOnDoneStep: true // Enable/Disable the done steps navigation
                            }
                 });

          $("#smartwizard").on("leaveStep", function(e, anchorObject, stepNumber, stepDirection) {
                var elmForm = $("#form-step-" + stepNumber);
                // stepDirection === 'forward' :- this condition allows to do the form validation
                // only on forward navigation, that makes easy navigation on backwards still do the validation when going next
                if(stepDirection === 'forward' && elmForm){
                    elmForm.validator('validate');
                    var elmErr = elmForm.find('.has-error');
                    console.log(elmForm.find('.has-error'));
                    
                    if(elmErr && elmErr.length > 0){
                       
                        // Form validation failed
                        $.notify({
                            message : "There's still an error in the form.",
                        },{
                            type: 'info',
                            offset: {
                                x : 500,
                            }
                        });
                        
                        $.notify({
	message: 'There is still an error in the form.'
},{
	type: 'danger',
        offset: { x: 600, y: 20},
	delay: 3000,
	template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
		'<span data-notify="title">{1}</span>' +
		'<span data-notify="message">{2}</span>' +
	'</div>'
});
                        return false; //original
  
                    } 
                }
                
                return true;
            });
            
            $("#smartwizard").on("showStep", function(e, anchorObject, stepNumber, stepDirection) {
                // Enable finish button only on last step
                var btnFinish = $('.btn-finish');
                if(stepNumber == 8 || (stepNumber == 7 && btnFinish.text() == 'Submit scoreSubmit score')){
                    btnFinish.removeAttr("disabled");  
                    //alert(btnFinish.text());
                }else{
                    btnFinish.prop("disabled", true);
                }
                //Get No of Tool on YES
//                var total_yes = 0;
//                for(var i=1; i <= 7; i++){
//                    
//                    if(('#tool' + i +'_yes_check').checked){
//                        total_yes++;
//                    }
//                }
//                $("#total_yes").html(total_yes);     
                var div = $("label");
                $("#total_yes").html(div.find("input[type='radio'][id*='_yes_check']:checked").length);
                
            });
            
            // Initialize the beginReset event
            $("#smartwizard").on("beginReset", function(e) {
               return confirm("Do you want to reset this form?");
            });

            // Initialize the endReset event
            $("#smartwizard").on("endReset", function(e) {
               alert("endReset called");
               $.notify("Form Reset");
      });  
            
       

   
           
        });
        
        