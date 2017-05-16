'use strict';

(function(){

	var azbn_p = 'azbn.';

	var LS = {
		set : function(id,value) {localStorage.setItem(azbn_p + id, value);},
		get : function(id) {var item = localStorage.getItem(azbn_p + id);if(typeof item !== 'undefined' && item != null) {return item;} else {return null;}},
		remove : function(id) {localStorage.removeItem(azbn_p + id);},
		clear : function() {localStorage.clear();},
		obj2s : function(id,obj2save) {this.set(id, JSON.stringify(obj2save));},
		s2obj : function(id) {var item = this.get(id);if(typeof item != 'undefined' && item != null) {return JSON.parse(item);} else {return null;}},
	};
	/*
	var SS = {
		set : function(id,value) {sessionStorage.setItem(azbn_p + id, value);},
		get : function(id) {var item = sessionStorage.getItem(azbn_p + id);if(typeof item !== 'undefined' && item != null) {return item;} else {return null;}},
		remove : function(id) {sessionStorage.removeItem(azbn_p + id);},
		clear : function() {sessionStorage.clear();},
		obj2s : function(id,obj2save) {this.set(id, JSON.stringify(obj2save));},
		s2obj : function(id) {var item = this.get(id);if(typeof item !== 'undefined' && item != null) {return JSON.parse(item);} else {return null;}},
	};
	*/
	
	var Cart = {
		
		prefix : 'cart.',
		
		lscart_uid : function(){
			return this.prefix + 'default';
		},
		
		set : function(product, amount) {
			var cart = LS.s2obj(this.lscart_uid());
			
			if(cart != null) {
				
			} else {
				cart = {};
			}
			
			if(cart[product.id]) {
				
			} else {
				cart[product.id] = {};
			}
			
			if(cart[product.id][product.material]) {
				
			} else {
				cart[product.id][product.material] = {};
			}
			
			if(cart[product.id][product.material][product.size]) {
				
			} else {
				cart[product.id][product.material][product.size] = {};
			}
			
			cart[product.id][product.material][product.size][product.color] = amount;
			
			LS.obj2s(this.lscart_uid(), cart);
			
		},
		
		getQty : function(product) {
			var cart = LS.s2obj(this.lscart_uid());
			
			if(cart != null) {
				
			} else {
				cart = {};
			}
			
			var res = 0;
			
			res = cart[product.id] ? (cart[product.id][product.material] ? (cart[product.id][product.material][product.size] ? (cart[product.id][product.material][product.size][product.color] ? cart[product.id][product.material][product.size][product.color] : res) : res) : res) : res;
			
			//return parseInt(cart[product.id][product.material][product.size][product.color] || 0);
			
			return parseInt(res);
		},
		
		getAll : function(){
			var cart = LS.s2obj(this.lscart_uid());
			
			if(cart != null) {
				
			} else {
				cart = {};
			}
			
			var res = 0;
			
			for(var _id in cart) {
				
				(function(by_id){
					
					for(var _material in by_id) {
						
						(function(by_material){
							
							for(var _size in by_material) {
								
								(function(by_size){
									
									for(var _color in by_size) {
										
										res = res + by_size[_color];
										
									}
									
								})(by_material[_size]);
								
							}
							
						})(by_id[_material]);
						
					}
					
				})(cart[_id]);
				
			}
			
			return res;
			
		},
		
		del : function(product) {
			var cart = LS.s2obj(this.lscart_uid());
			
			if(cart != null) {
				
			} else {
				cart = {};
			}
			
			if(cart[product.id]) {
				
				if(cart[product.id][product.material]) {
					
					if(cart[product.id][product.material][product.size]) {
						
						if(cart[product.id][product.material][product.size][product.color]) {
							
							cart[product.id][product.material][product.size][product.color] = null;
							delete cart[product.id][product.material][product.size][product.color];
							
							LS.obj2s(this.lscart_uid(), {});
							
						}
						
					}
					
				}
				
			}
			
		},
		
		clear : function() {
			LS.obj2s(this.lscart_uid(), {});
		},
		
	};
	
	$(function(){
		
		$(document.body).on('azbn.cart.recalc', null, {}, function(){
			
			var product = {
				id : parseInt($('input[name="product_order[id]"]').val()),
				material : $('input[name="product_order[material]"]').val(),
				size : $('input[name="product_order[x]"]').val() + 'x' + $('input[name="product_order[y]"]').val(),
				color : $('input[name="product_order[color]"]').val(),
			};
			
			var amount = parseInt($('input[name="product_order[qty]"]').val());
			
			Cart.set(product, amount);
			
		});
		
		$(document.body).on('azbn.cart.getqty', null, {}, function(){
			
			var product = {
				id : parseInt($('input[name="product_order[id]"]').val()),
				material : $('input[name="product_order[material]"]').val(),
				size : $('input[name="product_order[x]"]').val() + 'x' + $('input[name="product_order[y]"]').val(),
				color : $('input[name="product_order[color]"]').val(),
			};
			
			$('input[name="product_order[qty]"]').val(Cart.getQty(product));
			
		});
		
		$(document.body).on('azbn.cart.getallitems', null, {}, function(){
			
			//console.log(Cart.getAll());
			$('.azbn-cart-items-qty').html(Cart.getAll());
			
		});
		
		
		$(document.body).on('click.azbn', '.azbn-flt-btn', {}, function(event){
			event.preventDefault();
			
			
			
		});
		
		$(document.body).on('click.azbn', '.azbn-flt-btn[data-flt-key="color"] a', {}, function(event){
			event.preventDefault();
			
			var btn = $(this);
			var p = btn.parent();
			
			var color = p.attr('data-color') || '';
			
			$('input[name="product_order[color]"]').val(color);
			
			$('.azbn-flt-btn-color-result').html(color);
			
			$(document.body).trigger('azbn.cart.getqty');
			//$(document.body).trigger('azbn.cart.getallitems');
			
		});
		
		$(document.body).on('click.azbn', '.azbn-flt-btn[data-flt-key="material"]', {}, function(event){
			event.preventDefault();
			
			var btn = $(this);
			
			var value = btn.attr('data-flt-value') || '';
			
			$('.azbn-flt-btn[data-flt-key="material"]').removeClass('is--active');
			btn.addClass('is--active');
			
			$('input[name="product_order[material]"]').val(value);
			
			$('.azbn-flt-btn[data-flt-key="x"]').trigger('azbn.filter.by_material');
			
			$(document.body).trigger('azbn.cart.getqty');
			//$(document.body).trigger('azbn.cart.getallitems');
			
		});
		
		$(document.body).on('azbn.filter.by_material', '.azbn-flt-btn[data-flt-key="x"], .azbn-flt-btn[data-flt-key="y"]', {}, function(event){
			event.preventDefault();
			
			var ul = $(this);
			var li = ul.find('li');
			
			var flt_key = ul.attr('data-flt-key') || '';
			var flt_by = $('input[name="product_order[material]"]').val();
			
			li.hide();
			li.filter('[data-flt-material="' + flt_by + '"]').show('fast').eq(0).find('a').trigger('click');
			
			$(document.body).trigger('azbn.cart.getqty');
			//$(document.body).trigger('azbn.cart.getallitems');
			
		});
		
		
		
		$(document.body).on('click.azbn', '.azbn-flt-btn[data-flt-key="x"] li a', {}, function(event){
			event.preventDefault();
			
			var btn = $(this);
			var li = btn.closest('li');
			var ul = li.closest('ul');
			var x = li.attr('data-flt-x') || '';
			var x_ul = ul.attr('data-flt-key') || '';
			var flt_by = $('input[name="product_order[material]"]').val();
			var cost = li.attr('data-flt-cost');
			
			var ul_y = $('.azbn-flt-btn[data-flt-key="y"]');
			ul_y
				.find('li')
					.hide()
				.parent()
				.find('li')
					.filter('[data-flt-material="' + flt_by + '"][data-flt-x="' + x + '"]')
						.show('fast')
					.eq(0).find('a')
						.trigger('click')
			;
			
			$('.azbn-flt-btn-cost-result').html(cost);
			$('.azbn-flt-btn-size-' + x_ul + '-result').html(x);
			$('input[name="product_order[' + x_ul + ']"]').val(x);
			
			$(document.body).trigger('azbn.cart.getqty');
			//$(document.body).trigger('azbn.cart.getallitems');
			
		});
		
		$(document.body).on('click.azbn', '.azbn-flt-btn[data-flt-key="y"] li a', {}, function(event){
			event.preventDefault();
			
			var btn = $(this);
			var li = btn.closest('li');
			var ul = li.closest('ul');
			var x = li.attr('data-flt-y') || '';
			var x_ul = ul.attr('data-flt-key') || '';
			var cost = li.attr('data-flt-cost');
			
			$('.azbn-flt-btn-cost-result').html(cost);
			$('.azbn-flt-btn-size-' + x_ul + '-result').html(x);
			$('input[name="product_order[' + x_ul + ']"]').val(x);
			
			$(document.body).trigger('azbn.cart.getqty');
			//$(document.body).trigger('azbn.cart.getallitems');
			
		});
		
		
		
		$(document.body).on('click.azbn', '.azbn-qty-btn', {}, function(event){
			event.preventDefault();
			
			var btn = $(this);
			var mnozh = parseInt(btn.attr('data-qty-value') || 0);
			
			var input = $('input[name="product_order[qty]"]');
			
			var _v = parseInt(input.val());
			
			_v = _v + mnozh;
			
			if(_v > -1) {
				input.val(_v);
			} else {
				input.val(0);
			}
			
			$(document.body).trigger('azbn.cart.recalc');
			$(document.body).trigger('azbn.cart.getallitems');
			
		});
		
		$(document.body).on('keyup.azbn', 'input[name="product_order[qty]"]', {}, function(event){
			event.preventDefault();
			
			var input = $(this);
			
			var _v = parseInt(input.val());
			
			if(_v < 0) {
				input.val(0);
			}
			
			$(document.body).trigger('azbn.cart.recalc');
			$(document.body).trigger('azbn.cart.getallitems');
			
		});
		
		
		$(document.body).on('click.azbn', '.azbn-product-order-btn', {}, function(event){
			event.preventDefault();
			
			window.location.href = '/cart/';
			
			//var btn = $(this);
			//var form = $('.azbn-product-order-form');
			
			/*
			$.post('/wp-admin/admin-ajax.php',
				{
					'action':'azbnajax_call',
					'method':'get/post',
					'id':prompt('ID','0'),
					'type':'plain',
				},
				function(data){
					alert(data);
				}
			);
			*/
			
		});
		
		
		
		$('.azbn-flt-btn[data-flt-key="material"]').eq(0).trigger('click');
		$('.azbn-flt-btn[data-flt-key="color"]').eq(0).find('a').trigger('click');
		
		$(document.body).trigger('azbn.cart.getqty');
		$(document.body).trigger('azbn.cart.getallitems');
		
	});

})();