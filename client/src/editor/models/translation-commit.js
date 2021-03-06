var Backbone = require('backbone');
var BackboneCycle = require('backbone.cycle');

module.exports = Backbone.Model.extend({
  urlRoot: function() {
    return '/api/translation_commits/' + this.get('source_locale') + '/' + this.get('target_locale');
  },

  defaults: {
    key: '',
    source_locale: '',
    source_phrase: '',
    target_locale: '',
    target_phrase: '',
    is_translated: false,
    is_approved: false,
    edited: false
  },

  initialize: function(options) {
    BackboneCycle.SelectableModel.applyTo( this );
  }
})
