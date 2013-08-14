(function($){
    $.fn.gcrossNumberToWords = function(options){
		var settings = $.extend({ 
							word_element: "amount_in_words",
							currency: "Pesos"
						}, options );
						
		var th = ['','thousand','million', 'billion','trillion']; 
		var dg = ['zero','one','two','three','four', 'five','six','seven','eight','nine'];
		var tn = ['ten','eleven','twelve','thirteen', 'fourteen','fifteen','sixteen', 'seventeen','eighteen','nineteen']; 
		var tw = ['twenty','thirty','forty','fifty', 'sixty','seventy','eighty','ninety']; 
		
		var obj = this;
		
		
		this.keyup(function(){
			applyConversion();
		});
		
		if(this.val() == "" || this.val() == "0" || this.val() == "0.00"){ 
			return '';
		}
		
		applyConversion();
		
		function applyConversion(){  
			$("#"+settings.word_element).val(capitalize(convertToWords(obj.val())));
		}
		
		function capitalize(val) {
			return val.charAt(0).toUpperCase() + val.slice(1).toLowerCase();
		}
		
		function convertToWords(entered_number){
				 entered_number = entered_number.toString();
				 entered_number = entered_number.replace(/[\, ]/g,'');
				 
				 if (entered_number != parseFloat(entered_number)) 
					return  "Invalid Number";
				 var index_decimal = entered_number.indexOf('.'); 
				 if (index_decimal == -1)
					index_decimal = entered_number.length; 
				 if (index_decimal > 15)
					return 'Too big'; 
					
				 var entered_number_array = entered_number.split(''); 
				 var str = ''; 
				 var sk = 0; 
				 for (var i=0; i < index_decimal; i++)
				 {
					if ((index_decimal-i)%3==2) {
						if (entered_number_array[i] == '1')
						{	
							str += tn[Number(entered_number_array[i+1])] + ' '; i++; sk=1;
						} 
						else if (entered_number_array[i]!=0)
						{
							str += tw[entered_number_array[i]-2] + ' ';
							sk=1;
						}
					 } 
					 else if (entered_number_array[i]!=0) {
						str += dg[entered_number_array[i]] +' '; 
						if ((index_decimal-i)%3==0) 
							str += 'hundred ';sk=1;
					 } 
					 
					 if ((index_decimal-i)%3==1) {
						if (sk) 
							str += th[(index_decimal-i-1)/3] + ' ';
							sk=0;
					 }
				 } 
				str += settings.currency+" ";
				if (index_decimal != entered_number.length) {
					var y = entered_number.length; 
					str += 'and '; 
					var c = "";
					for (var i=index_decimal+1; i<y; i++)
						c += entered_number_array[i];
					str += getCents(c);	
				}  
				return str.replace(/\entered_number+/g,' '); 
		}
		
		function getCents(cent){
			 cent = cent.toString(); 
			 console.log(cent);
			 cent = cent.replace(/[\, ]/g,'');
			 
			 if (cent != parseFloat(cent)) 
				return 'not a number'; 
			 var index_decimal = cent.indexOf('.'); 
			 if (index_decimal == -1)
				index_decimal = cent.length; 
			 if (index_decimal > 15)
				return 'too big'; 
				
			 var entered_number_array = cent.split(''); 
			 var str = ''; 
			 var sk = 0; 
			 var total_zero = "0";
			 for (var i=0; i < index_decimal; i++)
			 {
				if ((index_decimal-i)%3==2) {
					if (entered_number_array[i] == '1')
					{	
						str += tn[Number(entered_number_array[i+1])] + ' '; i++; sk=1;
					} 
					else if (entered_number_array[i]!=0)
					{
						str += tw[entered_number_array[i]-2] + ' ';
						sk=1;
					}
				 } 
				 else if (entered_number_array[i]!=0) {
					str += dg[entered_number_array[i]] +' '; 
					if ((index_decimal-i)%3==0) 
						str += 'hundred ';sk=1;
				 }
				else if(entered_number_array[i]==0){
					total_zero += "0";
				}
				 
				 if ((index_decimal-i)%3==1) {
					if (sk) 
						str += th[(index_decimal-i-1)/3];
						sk=0;
				 }
			 }  
			 
			 if(index_decimal == total_zero.length){
				
				str += dg[0] + " ";
			 }
			 return str += "centavo";
		}	
	
	}
})(jQuery);