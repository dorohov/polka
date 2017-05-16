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
		
		set : function(product, qty) {
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
			
			cart[product.id][product.material][product.size][product.color] = {
				qty : qty,
				cost : product.cost ? parseFloat('' + product.cost.replace(' ', '')) : cart[product.id][product.material][product.size][product.color].cost,
			};
			
			LS.obj2s(this.lscart_uid(), cart);
			
		},
		
		getQty : function(product) {
			var cart = LS.s2obj(this.lscart_uid());
			
			if(cart != null) {
				
			} else {
				cart = {};
			}
			
			var res = 0;
			
			res = cart[product.id] ? (cart[product.id][product.material] ? (cart[product.id][product.material][product.size] ? (cart[product.id][product.material][product.size][product.color] ? cart[product.id][product.material][product.size][product.color].qty : res) : res) : res) : res;
			
			return parseInt(res);
		},
		
		getAll : function(){
			
			var cart = LS.s2obj(this.lscart_uid());
			
			if(cart != null) {
				
			} else {
				cart = {};
			}
			
			var res = 0;
			var sum = 0;
			
			for(var _id in cart) {
				
				(function(by_id){
					
					for(var _material in by_id) {
						
						(function(by_material){
							
							for(var _size in by_material) {
								
								(function(by_size){
									
									for(var _color in by_size) {
										
										res = res + by_size[_color].qty;
										sum = sum + (by_size[_color].qty * by_size[_color].cost);
										
									}
									
								})(by_material[_size]);
								
							}
							
						})(by_id[_material]);
						
					}
					
				})(cart[_id]);
				
			}
			
			return {
				qty : res,
				sum : sum,
			};
			
		},
		
		iterAll : function(cb, cb2) {
			
			var cart = LS.s2obj(this.lscart_uid());
			
			if(cart != null) {
				
			} else {
				cart = {};
			}
			
			var sum = 0;
			
			for(var _id in cart) {
				
				(function(by_id){
					
					for(var _material in by_id) {
						
						(function(by_material){
							
							for(var _size in by_material) {
								
								(function(by_size){
									
									for(var _color in by_size) {
										
										//res = res + by_size[_color];
										sum = sum + (by_size[_color].qty * by_size[_color].cost);
										
										cb({
											id : _id,
											material : _material,
											size : _size,
											color : _color,
											qty : by_size[_color].qty,
											cost : by_size[_color].cost,
										});
										
									}
									
								})(by_material[_size]);
								
							}
							
						})(by_id[_material]);
						
					}
					
				})(cart[_id]);
				
			}
			
			cb2(sum);
			
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
							
							LS.obj2s(this.lscart_uid(), cart);
							
						}
						
					}
					
				}
				
			}
			
		},
		
		clear : function() {
			LS.obj2s(this.lscart_uid(), {});
		},
		
	};
	
	
	var ideal_item;
	
	var CartPageItem = function(product) {
		
		console.log(product);
		
		var item = ideal_item.clone(true);
		
		item
			.attr('data-product-id', product.id)
			.attr('data-product-material', product.material)
			.attr('data-product-size', product.size)
			.attr('data-product-color', product.color)
			.attr('data-product-cost', product.cost)
		;
		
		var size = product.size.split('x');
		size[0] = parseFloat(size[0]);
		size[1] = parseFloat(size[1]);
		
		item.find('.azbn-cart-item__qty').val(product.qty);
		item.find('.azbn-cart-item__img').attr('src', product.img.sm);
		item.find('.azbn-cart-item__link').attr('href', product.link);
		item.find('.azbn-cart-item__title').html(product.title);
		item.find('.azbn-cart-item__cost').html(product.cost);
		item.find('.azbn-cart-item__color').html(product.color);
		item.find('.azbn-cart-item__art').html(product.art);
		item.find('.azbn-cart-item__material').html(CatalogMaterials[product.material]);
		item.find('.azbn-cart-item__x').html(size[0]);
		item.find('.azbn-cart-item__y').html(size[1]);
		
		if(size[0] > 0 && size[1] > 0) {
			
		} else {
			item.find('.azbn-cart-item__to-delete').empty().remove();
		}
		
		return item;
		
	};
	
	
	$(function(){
		
		if($('.basket-page .basket-list .azbn-cart-item').length) {
			
			/*
			if(typeof CatalogData != 'undefined') {
				
			} else {
				
				var CatalogData = {};
				
			}
			*/
			
			ideal_item = $('.basket-page .basket-list .azbn-cart-item').eq(0).detach();
			
			$('.basket-page .basket-list .azbn-cart-item').empty().remove();
			
			Cart.iterAll(function(item){
				
				//console.log(CatalogData[item.id] ? item : 'Not found: ' + item.id);
				
				CartPageItem($.extend(item, CatalogData[item.id])).appendTo($('.basket-page .basket-list'));
				
			}, function(sum){
				
				if(sum > 0) {
					
					$('.azbn-cart-deliver-row .azbn-cart-sum').html(sum);
					
					$('.azbn-formsave-order input[name="o[order]"]').val(encodeURIComponent(LS.get(Cart.lscart_uid())));
					
				} else {
					
					$('.azbn-cart-title').html('Корзина пуста');
					$('.azbn-cart-deliver-row').empty().remove();
					
				}
				
			});
			
		}
		
		$(document.body).on('azbn.cart.recalc', null, {}, function(event){
			
			var product = {
				id : parseInt($('input[name="product_order[id]"]').val()),
				material : $('input[name="product_order[material]"]').val(),
				size : $('input[name="product_order[x]"]').val() + 'x' + $('input[name="product_order[y]"]').val(),
				color : $('input[name="product_order[color]"]').val(),
				cost : $('input[name="product_order[cost]"]').val(),
			};
			
			var amount = parseInt($('input[name="product_order[qty]"]').val());
			
			Cart.set(product, amount);
			
		});
		
		$(document.body).on('azbn.cart.recalc2', null, {}, function(event){
			
			$('.azbn-cart-item').each(function(index){
				
				var block = $(this);
				
				var product = {
					id : parseInt(block.attr('data-product-id') || 0),
					material : block.attr('data-product-material') || '',
					size : block.attr('data-product-size') || '',
					color : block.attr('data-product-color') || '',
					cost : block.attr('data-product-cost') || '0',
				};
				
				var amount = parseInt(block.find('.azbn-cart-qty-input').val());
				
				Cart.set(product, amount);
				
			});
			
		});
		
		$(document.body).on('azbn.cart.getqty', null, {}, function(event){
			
			var product = {
				id : parseInt($('input[name="product_order[id]"]').val()),
				material : $('input[name="product_order[material]"]').val(),
				size : $('input[name="product_order[x]"]').val() + 'x' + $('input[name="product_order[y]"]').val(),
				color : $('input[name="product_order[color]"]').val(),
			};
			
			$('input[name="product_order[qty]"]').val(Cart.getQty(product));
			
		});
		
		$(document.body).on('azbn.cart.getallitems', null, {}, function(event){
			
			$('.azbn-cart-items-qty').html(Cart.getAll().qty);
			
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
			$('input[name="product_order[cost]"]').val(cost);
			
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
			$('input[name="product_order[cost]"]').val(cost);
			
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
		
		
		
		
		
		
		
		$(document.body).on('click.azbn', '.azbn-cart-item .azbn-cart-qty-btn', {}, function(event){
			event.preventDefault();
			
			var btn = $(this);
			var cont = btn.closest('.azbn-cart-item');
			
			var mnozh = parseInt(btn.attr('data-qty-value') || 0);
			
			var input = cont.find('.azbn-cart-qty-input');
			
			var _v = parseInt(input.val());
			
			_v = _v + mnozh;
			
			if(_v > -1) {
				input.val(_v);
			} else {
				input.val(0);
			}
			
			$(document.body).trigger('azbn.cart.recalc2');
			$(document.body).trigger('azbn.cart.getallitems');
			
			$('.azbn-cart-sum').html(Cart.getAll().sum);
			
			$('.azbn-formsave-order input[name="o[order]"]').val(encodeURIComponent(LS.get(Cart.lscart_uid())));
			
		});
		
		$(document.body).on('keyup.azbn', '.azbn-cart-item .azbn-cart-qty-input', {}, function(event){
			event.preventDefault();
			
			var input = $(this);
			
			var _v = parseInt(input.val());
			
			if(_v < 0) {
				input.val(0);
			}
			
			$(document.body).trigger('azbn.cart.recalc2');
			$(document.body).trigger('azbn.cart.getallitems');
			
			$('.azbn-cart-sum').html(Cart.getAll().sum);
			
			$('.azbn-formsave-order input[name="o[order]"]').val(encodeURIComponent(LS.get(Cart.lscart_uid())));
			
		});
		
		$(document.body).on('click.azbn', '.azbn-cart-item .azbn-cart-del-btn', {}, function(event){
			event.preventDefault();
			
			var btn = $(this);
			var cont = btn.closest('.azbn-cart-item');
			
			if(confirm('Удалить данную позицию?')) {
				
				Cart.del({
					id : parseInt(cont.attr('data-product-id')),
					material : cont.attr('data-product-material'),
					color : cont.attr('data-product-color'),
					size : cont.attr('data-product-size'),
				});
				
				cont.empty().remove();
				
			}
			
			$(document.body).trigger('azbn.cart.recalc2');
			$(document.body).trigger('azbn.cart.getallitems');
			
			$('.azbn-cart-sum').html(Cart.getAll().sum);
			
			$('.azbn-formsave-order input[name="o[order]"]').val(encodeURIComponent(LS.get(Cart.lscart_uid())));
			
		});
		
		
		
		
		
		
		$('.azbn-flt-btn[data-flt-key="material"]').eq(0).trigger('click');
		$('.azbn-flt-btn[data-flt-key="color"]').eq(0).find('a').trigger('click');
		
		$(document.body).trigger('azbn.cart.getqty');
		$(document.body).trigger('azbn.cart.getallitems');
		
		
		
		$(document.body).on('submit', '.azbn-formsave-ask', {}, function(event){
			event.preventDefault();
			
			var form = $(this);
			var _form = form.clone(true);
			
			_form
				.append($('<input/>', {
					type : 'hidden',
					name : 'action',
					value : 'azbnajax_call',
				}))
				.append($('<input/>', {
					type : 'hidden',
					name : 'method',
					value : 'formsave_ask',
				}))
				.append($('<input/>', {
					type : 'hidden',
					name : 'type',
					value : 'plain',
				}))
			;
			
			$.post('/wp-admin/admin-ajax.php', _form.serialize(), function(data){
				
				_form.empty().remove();
				form.trigger('reset');
				
				$('#modal-message-ask').modal();
				console.log(data);
					
			});
			
		});
		
		$(document.body).on('submit', '.azbn-formsave-order', {}, function(event){
			event.preventDefault();
			
			var form = $(this);
			var _form = form.clone(true);
			
			_form
				.append($('<input/>', {
					type : 'hidden',
					name : 'action',
					value : 'azbnajax_call',
				}))
				.append($('<input/>', {
					type : 'hidden',
					name : 'method',
					value : 'formsave_order',
				}))
				.append($('<input/>', {
					type : 'hidden',
					name : 'type',
					value : 'plain',
				}))
			;
			
			$.post('/wp-admin/admin-ajax.php', _form.serialize(), function(data){
				
				_form.empty().remove();
				form.trigger('reset');
				
				Cart.clear();
				
				$('#modal-message-order').modal();
				
			});
			
		});
		
		
	});

})();