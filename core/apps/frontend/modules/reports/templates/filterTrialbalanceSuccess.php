<div id="reportMenu">
        	<ul>
            	<li><a href="reports-financial-trial-balance.php">Trial Balance</a></li>
                <li><a href="">Basic Income Statement</a></li>
                <li><a href="">Basic Balance Sheet</a></li>
                <li><a href="">Comparative Income Statement</a></li>
                <li><a href="">Bank Reconciliation</a></li>
                <li><a href="">Graph Analysis</a></li>
                <li><a href="">Percentage Analysis</a></li>
                <li><a href="">Daily Cash Position Report</a></li>
                <li><a href="">Cash Flow Report</a></li>
            </ul>
        </div>
        
        <div id="reportView">
        	<div class="title">Generate Trial Balance</div>
            
            <div class="reportViewContent">
                	<p class="labelReport">Period: </p>		
                    <p class="labelList">
                    	<input type="radio" id="date1" name="period" />
                        <label for="date1"><span></span>Range Only</label>
                    </p>
                    <p class="labelList">
                        <input type="radio" id="date2" name="period" />
                        <label for="date2"><span></span>To Date / As Of</label>
                    </p>
                    <p class="labelList"> 
                       <input type="radio" id="date3" name="period" />
                       <label for="date3"><span></span>Range with Beginning Balances</label>
                    </p> 
            </div>
            
            <div class="reportViewContent">
                <div class="reportViewTitle">Date From:</div>
                <div style="float:left; width:250px;">
                    <input type="text" />
                </div>
                <div class="reportViewTitle">Date To:</div>
                <div style="float:left; width:250px;">
                    <input type="text" />
                </div>
            </div>
            <div class="reportViewContent">  
            	<div class="reportViewTitle">Sort By:</div>
                <div class="styled-select">
                    <select>
                    	<option>By Class Per Code</option>
                        <option>Alphabetical Order</option>
                        <option>Order By Code</option>
                    </select>
                </div>
            </div>
                        
            <div class="reportRadio">            		
                <ul>
                	<li><input type="radio" id="g1" name="currency" />
                		<label for="g1"><span></span>All Currency without Grouping in PHP</label>
                    </li>
                    <li><input type="radio" id="g2" name="currency" />
                		<label for="g2"><span></span>All Currency Grouped Per Currency in Original Amount</label> 
                        <ul>	
                            <li><input type="radio" id="g2-1" name="currency1" />
                			<label for="g2-1"><span></span>No Comparison Amount</label> 
                    		</li>
                            <li><input type="radio" id="g2-2" name="currency1" />
                			<label for="g2-2"><span></span>With Comparison Amount</label> 
                    		</li>
                        </ul>
                    </li>
                    <li><input type="radio" id="g3" name="currency" />
                		<label for="g3"><span></span>Per Currency in Original Amount</label> 
                        <div class="styled-select" style="margin: 5px 45px 8px;">
                        	<select>
                            	<option>PHP</option>
                            </select>
                        </div>
                    </li>
                    <li><input type="radio" id="g4" name="currency" />
                		<label for="g4"><span></span>All Currency Grouped Per Currency in PHP</label> 
                    </li>
                </ul>
            </div>
            
            
            <div class="reportRadio">
            	<ul>
                	<li>
                    <input type="radio" id="w1" name="department" />
                    <label for="w1"><span></span>Without Project/Department</label> 
                    </li>
                    <li>
                    <input type="radio" id="w2" name="department" />
                    <label for="w2"><span></span>All Project/Department Code Per Combination</label> 
                    </li>
                    <li>                
                    <input type="radio" id="w3" name="department" />
                	<label for="w3"><span></span>Group Per Project/Department</label> 
                    	<ul>
                			<li><input type="checkbox" id="c1" name="department1" />
                        		<label for="c1"><span></span>With Project</label>
                        	</li>
                            <li><input type="checkbox" id="c2" name="department2" />
                        		<label for="c2"><span></span>With Department</label>
                            </li>
                        </ul>
                     </li>
                     <li>
                     <input type="radio" id="w4" name="department" />
                     <label for="w4"><span></span>All Currency Grouped Per Currency in PHP</label> 
                 	</li>
                 </ul>
            </div>            
            
            
            <div class="reportRadio">            		
                <ul>
                	<li><input type="radio" id="r1" name="group" />
                		<label for="r1"><span></span>Normal Trial Balance</label>
                    </li>
                    <li><input type="radio" id="r2" name="group" />
                		<label for="r2"><span></span>Consolidated Per Group</label> 
                    </li>
                    <li><input type="radio" id="r3" name="group" />
                		<label for="r3"><span></span>Per Schedule GROUP CODE</label> 
                    </li>
                </ul>
            </div>
            
            <div class="formControlBtn" align="right">
                <a class="btnBack" href="">Cancel</a>
                <a class="btnPrint" href="reports-financial-trial-balance-1.php">View</a>
            </div>
            
        </div>    