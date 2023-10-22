<?php
                              //Test with CrackStation
  $password = "ilovephp";

  //echo md5("mbengue");        # If i execute, i receive this "95fbe48bf975aebba1354511c83d8333".

# If we execute this command; we receive a PASSWORD_BCRYPT and it can to change to all moments "$2y$08$hHK03ZaMUNU7w8j7d/x4JuJgSkHGDV9efS2.2QaFykusHRCBD3YE6".
# Also we can add a Long Name at middle of this PASSWORD_BCRYPT;    Ex: ["cost"=>8,"salt"=>"MyNameIsAmadouLamineMbengue"] "$2y$08$MyNameIsAmadouLamineMOO3kB3DSVbk8P9A24mkOnedhvBp5BAOi".
  $hash = password_hash($password,PASSWORD_BCRYPT,["cost"=>8]); # Affich PASSWORD_BCRYPT if i put ECHO.

  if(password_verify($password,$hash)){
    echo "Verified";                        # Affich Verifed.
  }

?>