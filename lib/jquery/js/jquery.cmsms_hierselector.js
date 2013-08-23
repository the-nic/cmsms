/**
 * @name cmsms.hierselector
 * @namespace cmsms.hierselector
 *
 * @example
 * $('#myinput').cmsms_hierselector();
 */
(function($){

  $.widget('cmsms.hierselector', {
    options: {
      parent: null,
      allowcurrent: null,
      use_perms: null,
      ignore_current: null,
      allow_all: null,
      use_name: null
     },

    /**
     * @ignore
     */
    _create: function() {
      if( typeof(cms_data['secure_param_name']) != 'undefined' ) this.options.secure_param = cms_data['secure_param_name'];
      if( typeof(cms_data['user_key']) != 'undefined' ) this.options.user_key = cms_data['user_key'];
      if( typeof(cms_data['admin_url']) != 'undefined' ) this.options.admin_url = cms_data['admin_url'];
      if( !this.options.secure_param ) throw 'The secure_param option (string) must be set in the cmsms_lock plugin';
      if( !this.options.user_key ) throw 'The user_key option (string) must be set in the cmsms_lock plugin';
      if( !this.options.admin_url ) throw 'The admin_url option (string) must be set in the cmsms_lock plugin';

      // initialization
      this.data = {};
      var v = this.element.val();
      this.data.name = this.element.attr('name');
      this.data.hidden_e = $('<input type="hidden" name="'+this.data.name+'" value="'+v+'"/>').insertAfter(this.element);
      this.data.ajax_url = this.options.admin_url + '/ajax_content.php?'+this.options.secure_param+'='+this.options.user_key;
      this.element.val('').removeAttr('name').attr('readonly','readonly');
      this._setup_dropdowns();
     },

    _setOption: function( k, v ) {
      this.options[k] = v;
      this._setup_dropdowns();
     },

     _build_select: function(name,data,selected_id) {
       var self = this;
       var sel = $('<select></select>').attr('id',name).addClass('cms_selhier').attr('title',cms_lang('hierselect_title'));
       sel.on('change',function(){
 	 var v = $(this).val();
         if( v < 1 ) {
           v = $(this).prev('select').val();
           if( typeof(v) == 'undefined' ) v = -1;
	 }
         self.data.hidden_e.val(v);
         self._setup_dropdowns();
       });
       var opt = $('<option>'+cms_lang('none')+'</option>').attr('value',-1);
       sel.append(opt);
       for( var i = 0; i < data.length; i++ ) {
         var opt = $('<option>'+data[i].display+'</option>').attr('value',data[i].content_id);
         if( data[i].content_id == selected_id ) opt.attr('selected','selected');
	 sel.append(opt);
       }
       return sel;
     },

    _setup_dropdowns: function() {
      var self = this;
      var v = this.data.hidden_e.val();
      self.element.prevAll('select.cms_selhier').remove();
      self.element.val('');
      if( v > 0 ) {
        $.ajax({
          url: this.data.ajax_url,
          data: { op: 'pageinfo', page: v },
          type: 'GET',
	  async: false
        })
        .done(function(res){
	  if( typeof(res.status) == 'undefined' || res.status == 'error' ) {
  	    console.debug(res.message);
	    alert(res.message)
	  }
  	  else {
            self.element.val(res.data.display);
            var pages = res.data.id_hierarchy.split('.');
            $.ajax({
              url: self.data.ajax_url,
     	      data: { 'op': 'pagepeers', 'pages': pages },
	      type: 'GET'
            })
	    .done(function(res) {
              if( typeof(res.status) == 'undefined' || res.status == 'error' ) {
	        console.debug(res.message);
  	        alert(res.message)
	      }
              else {
	        for( var i = 0; i < pages.length; i++ ) {
		  var page = pages[i];
                  // build the select for this item
                  var e = self._build_select(self.data.name+'_'+page,res.data[page],page);
                  var x = $('#'+self.data.name+'_c');
                  if( x.length == 1 ) {
                    e.insertBefore(x);
                  } else {
                    e.insertBefore(self.element);
                  }
                }
	      }
	    });
	  } 
        });
      }
      // get the children of the current value
      $.ajax({
        url: self.data.ajax_url,
        data: { 'op': 'childrenof', 'page': v },
        type: 'GET',
        async: false
      }).done(function(res) {
        if( typeof(res.data) != 'undefined' && res.data != null && res.data.length > 0 ) {
  	  self._build_select(self.data.name+'_c',res.data).insertBefore(self.element);
	}
      });
     },

    _noop: function() {}
  });
})(jQuery);