
   <?php require_once'menu.php'?>
         <div class="container">        
            <div class="row">          
             <div class="col-4"></div>
               <form method=POST class="col-4" style ="text-align : center; background-color : rgb(169,169,169); padding : 30px; border-radius : 20px; margin-top : 50px;"> 
                <h3 style="margin-top :10px; margin-bottom : 30px; color : white;"> Change ton petanqueur</h3>
                  <div class="form-group">
                      <label for="exampleInputEmail1">Last Name</label>
                      <input type="text" name='lastName' class="form-control" placeholder="Last name" >  
                   </div>
                        <div class="form-group">
                            <label for="exampleInputfirstName1">First Name</label>
                               <input type="text" name='firstName' class="form-control" placeholder="First name">
                         </div>  
                         <button type="submit" class="btn btn-light">Change</button>
               </form>  
               <div class="col-4"></div>                        
            </div>
         </div>
   </body>
</html>