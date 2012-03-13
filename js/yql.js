// Copyright (c) 2008 Yahoo! Inc. All rights reserved.
// Licensed under the Yahoo! Search BOSS Terms of Use
// (http://info.yahoo.com/legal/us/yahoo/search/bosstos/bosstos-2317.html)

/**
 * Given a query, a callback and a map of parameters return a YQL URL.
 * @param q
 * @param callback
 * @param params
 */
function createyqlquery(q, callback, params) {
  var base = "http://query.yahooapis.com/v1/public/yql?";
  if (!params) {
    params = {};
  }
  params.q = q;
  params.format = "json";
  if (callback) {
    params.callback = callback;
  }
  var queryparameters = "";
  for (var k in params) {
    queryparameters += k + "=" + encodeURI(params[k] + "&");
  }

  return base + queryparameters;
}

/**
 * Convenience functions for accessing YQL
 */
var YQL = {
  query: function(q, callback, params) {
    YAHOO.util.Get.script(createyqlquery(q, callback, params), {autopurge:true})
  },
  datasource: function(q, path, params) {
    return new YAHOO.widget.DS_ScriptNode(createyqlquery(q, null, params), path);
  }
};
