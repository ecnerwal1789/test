<?php

 echo CHtml::submitButton('Take Test',array('submit'=>array('/CandidateTest/TakeTest'))); 
?>



<Script type="text/javascript">
         $('#Submit').click(function()
                        {   
                            
                            document.getElementById('Candidate_Test').submit();			
                        }
        </script>