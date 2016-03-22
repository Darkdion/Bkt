// --------- DEPOSIT CALCULATION --------- //
(function(window){
	'use strict';
	
	function Calculate_Deposit(TOTAL,INIT,RATE,TERM,FREQ){
		this.total_amt = TOTAL,
		this.init_amt = INIT,
		this.f = FREQ,
		this.t = TERM,
		this.int_rate = RATE;
	}
	function cal_Deposit(TOTAL,INIT,RATE,TERM,FREQ){

		if(RATE==0)return (TOTAL-INIT)/TERM;

		RATE = RATE/100;
		var t1,t2,t3,t4,t5,t6;
		var s1 = 1+RATE,
			s2 = 1/FREQ,
			s3 = TERM/12,
			s4 = 12/FREQ,
			s5 = TERM%s4,
			s6 = (s5==0)?0:s4-s5;

		t1 = TOTAL - INIT*Math.pow(s1,s3);
		t2 = Math.pow(s1,s2)*(Math.pow(s1,s3)-1)/(Math.pow(s1,s2)-1);
		t3 = 1/s4*s6*Math.pow(s1,s5/12/2);
		t4 = t2 + t3;

		return t1/t4;
	}
	Calculate_Deposit.prototype.changeTotal_amount = function(TOTAL){
		this.total_amt = TOTAL;
		return this.cal();
	}
	Calculate_Deposit.prototype.changeInitial_amount = function(INIT){
		this.init_amt = INIT;
		return this.cal();
	}
	Calculate_Deposit.prototype.changeDeposit_frequency = function(FREQ){
		this.f = FREQ;
		return this.cal();
	}
	Calculate_Deposit.prototype.changeSavings_term = function(TERM){
		this.t = TERM;
		return this.cal();
	}
	Calculate_Deposit.prototype.changeInterest_rate = function(RATE){
		this.int_rate = RATE;
		return this.cal();
	}
	Calculate_Deposit.prototype.cal = function(){
		return Math.round(cal_Deposit(this.total_amt,this.init_amt,this.int_rate,this.t,this.f));
	}

	window.Calculate_Deposit = Calculate_Deposit;

})(window);
// --------- INTEREST CALCULATION --------- //
(function(window){
	'use strict';

	function Calculate_Savings(INIT,RATE,TERM,DEPOSIT,FREQ){
			this.init_amt = INIT,
			this.deposit_amt = DEPOSIT,
			this.f = FREQ,
			this.t = TERM,
			this.int_rate = RATE;
	}

	function cal_InitialInterest(INIT,RATE,TERM){
		RATE = RATE/100;
		var t1 = 1+RATE/2,
			t2 = TERM/12*2;
		return INIT*Math.pow(t1,t2);
	}

	function cal_DepositInterest(DEPOSIT,RATE,FREQ,TERM){

		if(RATE==0)return DEPOSIT*TERM;

		RATE = RATE/100;
		var s1 = 1+RATE,
			s2 = 1/FREQ,
			s3 = TERM/12,
			s4 = 12/FREQ,
			s5 = TERM%s4,
			s6 = (s5==0)?0:s4-s5,

			t1 = Math.pow(s1,s2)*(Math.pow(s1,s3)-1)/(Math.pow(s1,s2)-1),
			t2 = 1/s4*s6*Math.pow(s1,s5/12/2);

		return DEPOSIT*(t1+t2);
	}
	function cal_totalInvested(INIT,DEPOSIT,FREQ,TERM){
		return INIT+DEPOSIT*FREQ*TERM/12;
	}
	Calculate_Savings.prototype.changeInitial_amount = function(INIT){
		this.init_amt = INIT;
		return this.total();
	}
	Calculate_Savings.prototype.changeDeposit_amount = function(DEPO){
		this.deposit_amt = DEPO;
		return this.total();
	}
	Calculate_Savings.prototype.changeDeposit_frequency = function(FREQ){
		this.f = FREQ;
		return this.total();
	}
	Calculate_Savings.prototype.changeSavings_term = function(TERM){
		this.t = TERM;
		return this.total();
	}
	Calculate_Savings.prototype.changeInterest_rate = function(RATE){
		this.int_rate = RATE;
		return this.total();
	}
	Calculate_Savings.prototype.total = function(){
		var total_amt,total_invested,total_earned;
		var int_init = cal_InitialInterest(this.init_amt,this.int_rate,this.t),
			int_deposit = 0;

		if(this.f==0){
			total_amt = Math.round(int_init);
		}else{
			int_deposit = cal_DepositInterest(this.deposit_amt,this.int_rate,this.f,this.t);
			total_amt = Math.ceil(int_init+int_deposit);
		}
		total_invested = Math.ceil(cal_totalInvested(this.init_amt,this.deposit_amt,this.f,this.t));
		total_earned = total_amt-total_invested;
		/*
		console.log("=======================================");
		console.log("INIT\t= "+init_amt);
		console.log("DEPO\t= "+deposit_amt);
		console.log("FREQ\t= "+f);
		console.log("TERM\t= "+t);
		console.log("RATE\t= "+int_rate);
		console.log("result\t= "+total_amt+", "+total_invested+", "+total_earned);
		*/
		
		//console.log(mathSeries(init_amt,deposit_amt,f,t,int_rate));
		
		return [total_amt, total_invested, total_earned];
	}

	function mathSeries(INIT,DEPOSIT,FREQ,TERM,RATE){
		var r = 1+6*RATE*0.01/12,
			p = TERM/6,
			_invest = Math.ceil(INIT+DEPOSIT*FREQ*TERM/12),
			_total = 0;
		if(DEPOSIT==0){
			_total = Math.round(INIT*Math.pow(r,p));
			return [_total,_invest,_total-_invest];
		}
		r = 1+RATE*0.01/FREQ;
		p = FREQ*TERM/12+1;
		_total = Math.round(INIT*Math.pow(r,p)+DEPOSIT*((Math.pow(r,p)-1)/(r-1)-1));
		return [_total,_invest,_total-_invest];
	}


	window.Calculate_Savings = Calculate_Savings;

})(window);
//
(function(window){
	'use strict';
	
	function Calculator_Form(_form){

		var result_total = _form.find(".total-amt"),
			result_depos = _form.find(".deposit-amt"),
			result_earned = _form.find(".total-earned"),
			ini_rate = parseFloat(_form.find(".data-rate input").val());

		var _account = new Calculate_Savings(10000,ini_rate,12,0,12);

		//--------------------------------------//
		function showForm(a){
			result_total.text(formatNumber(a[0]));
			result_depos.text(formatNumber(a[1]));
			result_earned.text(formatNumber(a[2]));
		}
		
		var _input = _form.find("input");

		_input.click(function(){
			this.select();
		});
		_form.find(".form-style01").submit(function(e){
			e.preventDefault();
			_input.blur();
		});

		_form.find(".data-init input").blur(function(){
			var n = convertToNumber($(this).val());
			showForm(_account.changeInitial_amount(n));
			$(this).val(formatNumber(n));
		});
		_form.find(".data-rate input").blur(function(){
			var n = $(this).val();
			if(isNaN(parseFloat(n)))n=0;
			showForm(_account.changeInterest_rate(parseFloat(n)));
			$(this).val(formatPercent(n));
		});
		_form.find(".data-term input").blur(function(){
			var n = convertToNumber($(this).val());
			showForm(_account.changeSavings_term(n));
			$(this).val(n);
		});
		_form.find(".data-deposit input").blur(function(){
			var n = convertToNumber($(this).val());
			showForm(_account.changeDeposit_amount(n));
			$(this).val(formatNumber(n));
		});
		_form.find(".data-frequency select").change(function(){
			showForm(_account.changeDeposit_frequency(parseFloat($(this).val())));
		});
		//
		showForm(_account.total())
	}

	function convertToNumber(s){
		if(s=="")s="0";
		s += '';
		var n = s.replace(/[,]/g, "");
		if(isNaN(n))return 0;
		return parseFloat(n);
	}
	function formatNumber(n){
		n += '';
		return n.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
	}
	function formatToNumber(s){
		return parseFloat(s.replace(/[,]/g, ""));
	}
	function formatPercent(n){ return parseFloat(n).toFixed(2)+' %'; }


	window.Calculator_Form = Calculator_Form;

})(window);

function convertToNumber(s){
	if(s=="")s="0";
	s += '';
	var n = s.replace(/[,]/g, "");
	if(isNaN(n))return 0;
	return parseFloat(n);
}
function formatNumber(n){
	n += '';
	return n.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
}
function formatToNumber(s){
	return parseFloat(s.replace(/[,]/g, ""));
}
function formatPercent(n){ return parseFloat(n).toFixed(2)+' %'; }

$(function(){

	var _form01 = new Calculator_Form($("#cal-form01")),
		_form02 = new Calculator_Form($("#cal-form02"));
	//
	var _form3 = $("#cal-form03"),
		result_deposit = _form3.find(".deposit-amount"),
		ini_rate_form3 = parseFloat(_form3.find(".data-rate input").val());
	var _account02 = new Calculate_Deposit(100000,10000,ini_rate_form3,12,12);
	
	function showDepoResult(n){result_deposit.text(formatNumber(n));}
	
	var _input3 = _form3.find("input");

	_input3.click(function(){
		this.select();
	});
	_form3.find(".form-style01").submit(function(e){
		e.preventDefault();
		_input3.blur();
	});

	_form3.find(".data-target input").blur(function(){
		var n = convertToNumber($(this).val());
		showDepoResult(_account02.changeTotal_amount(n));
		$(this).val(formatNumber(n));
	});
	_form3.find(".data-init input").blur(function(){
		var n = convertToNumber($(this).val());
		showDepoResult(_account02.changeInitial_amount(n));
		$(this).val(formatNumber(n));
	});
	_form3.find(".data-rate input").blur(function(){
		var n = $(this).val();
		if(isNaN(parseFloat(n)))n=0;
		showDepoResult(_account02.changeInterest_rate(parseFloat(n)));
		$(this).val(formatPercent(n));
	});
	_form3.find(".data-term input").blur(function(){
		var n = convertToNumber($(this).val());
		showDepoResult(_account02.changeSavings_term(n));
		$(this).val(n);
	});
	_form3.find(".data-frequency select").change(function(){
		showDepoResult(_account02.changeDeposit_frequency(parseFloat($(this).val())));
	});
	showDepoResult(_account02.cal())
	//
	var top_form02 = $("#cal-form02"); 
	$("#btn-compare").click(function(e){
		$(this).toggleClass('toggle');
		top_form02.toggleClass("show");
		if(top_form02.hasClass("show")){
			var pY = top_form02.offset().top;
			$('html,body').delay(320).animate({ scrollTop:pY },1000,"easeInOutSine");
		}
		e.preventDefault();
	});
});
