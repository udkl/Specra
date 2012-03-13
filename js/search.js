// Copyright (c) 2008 Yahoo! Inc. All rights reserved.
// Licensed under the Yahoo! Search BOSS Terms of Use
// (http://info.yahoo.com/legal/us/yahoo/search/bosstos/bosstos-2317.html)

/**
 * The current executing query
 */
var currentquery;

/**
 * Grab all the elements we are going to manipulate.
 */
var myInput = document.getElementById("myInput");
var myInput2 = document.getElementById("myInput2");
var splashdiv = document.getElementById('splash');
var resultdiv = document.getElementById('searchresults');
var resultElements = YAHOO.util.Dom.getElementsByClassName("result");

/**
 * Manage the history
 */
var myModuleBookmarkedState = YAHOO.util.History.getBookmarkedState("query");
var myModuleInitialState = myModuleBookmarkedState || "";
YAHOO.util.History.register("query", myModuleInitialState, historyChanged);
YAHOO.util.History.initialize("yui-history-field", "yui-history-iframe");
YAHOO.util.History.onReady(function () {
  var myModuleCurrentState = YAHOO.util.History.getCurrentState("query");
  doquery(myModuleCurrentState, true);
});

/**
 * If the history changes, we might need to do a query.
 * @param state
 */
function historyChanged(state) {
  doquery(state, true);
}

/**
 * If things are clear, then reset the splash page. 
 */
if (myModuleInitialState == "") {
  splashdiv.display = "inline";
  document.getElementById('myInput2').focus();
}

/**
 * This does the heavy lifting for getting new search results and managing the history. It will also revert to
 * the splash page if an empty query is entered.
 * @param queryterm
 * @param nohistory
 */
function doquery(queryterm, nohistory) {
  if (queryterm == currentquery) return;
  currentquery = queryterm;
  if (!nohistory) {
    YAHOO.util.History.navigate("query", queryterm);
  }
  if (queryterm == "") {
    //resultdiv.style.display = "none";
    //splashdiv.style.display = "inline";
    myInput2.value = "";
    myInput2.focus();
    return;
  }

  // Attempting to fix a bug
  myInput.blur();

  myInput.value = queryterm;

  YQL.query("SELECT * FROM search.web WHERE view='language,delicious_toptags,delicious_saves,searchmonkey_feed,keyterms'" +
            " AND query=@query", "search", {query:queryterm});

  var ad = document.getElementById("ad");
  clearchildren(ad);
  ad.appendChild(getad(queryterm));
  addclear(ad);
  document.title = "4hoursearch - " + queryterm;
}

/**
 * This is the result of submitting the search form on the search results page.
 * @param query
 */
function searchclicked(query) {
  doquery(myInput.value);
  selectpage(1);
}

/**
 * This is the function that switches us from the splash page to a search result page.
 */
function splash() {
  myInput.value = document.getElementById("myInput2").value;
  searchclicked();
}

/**
 * Select the page tab at the bottom.
 * @param page
 */
function selectpage(page) {
  var pages = document.getElementById("pages");
  var children = YAHOO.util.Dom.getChildren(pages);
  for (var i in children) {
    var child = children[i];
    var div = YAHOO.util.Dom.getChildren(child);
    if (div[0].innerHTML == page) {
      div[0].className = "tab sel";
    } else {
      div[0].className = "tab";
    }
  }
}

/**
 * We don't mess with browser history or the ad for page changes yet. There are some other
 * bugs related to pages that result from this temporary choice.
 * @param page 1-based page # of search results
 */
function dopage(page) {
  YQL.query("SELECT * FROM search.web(" + (page * 10 - 9) + ",10) WHERE " +
            "view='language,delicious_toptags,delicious_saves,searchmonkey_feed,keyterms'" +
            " AND query=@query", "search", {query:myInput.value});
  selectpage(page);
}

/**
 * Convenience function for the image tester
 * @param s
 */
String.prototype.endsWith = function(s) {
  var reg = new RegExp(s + "$");
  return reg.test(this);
};

/**
 * Find a resource in the searchmonkey results that is an image.
 * @param tree
 */
function findimage(tree) {
  if (!tree) return null;

  var found;
  var object = tree['resource'];
  if (object) {
    found = object.toString();
    if (found.endsWith(".jpg") || found.endsWith(".gif") || found.endsWith(".png")) {
      return found;
    }
  }

  for (var k in tree) {
    var search = tree[k];
    if (search != tree && search != null) {
      object = findimage(search);
      if (object) {
        found = object.toString();
        if (found.endsWith(".jpg") || found.endsWith(".gif") || found.endsWith(".png")) {
          return found;
        }
      }
    }
  }

  return null;
}

/**
 * Given a tag, add it to the tagspan
 * @param tagspan
 * @param tag
 */
function addtag(tagspan, tag) {
  var taglink = document.createElement("a");
  taglink.href = 'http://delicious.com/tag/' + tag.name;
  taglink.innerHTML = tag.name;
  tagspan.appendChild(taglink);
  tagspan.appendChild(document.createTextNode(" "));
}

/**
 * Accumulate a new term to the topterms.
 * @param topterms
 * @param keyterm
 */
function addterm(topterms, keyterm) {
  var current = topterms[keyterm];
  if (current) {
    topterms[keyterm] = current + 1;
  } else {
    topterms[keyterm] = 1;
  }
}

/**
 * Sort the topterms by number of accumulated references.
 * @param topterms
 */
function sortterms(topterms) {
  var termlist = [];
  for (var k in topterms) {
    var map = {};
    map[k] = topterms[k];
    termlist.push(map);
  }
  termlist.sort(function(a, b) {
    var av;
    for (var ak in a) {
      av = a[ak];
    }
    var bv;
    for (var bk in b) {
      bv = b[bk];
    }
    return bv - av;
  });
  return termlist;
}

/**
 * Clear the children of a div except for one with id == except.
 * @param div
 * @param except
 */
function clearchildren(div, except) {
  var children = YAHOO.util.Dom.getChildren(div);
  for (var j in children) {
    var child = children[j];
    if (except) {
      if (child.id != except) {
        div.removeChild(child);
      }
    } else {
      div.removeChild(child);
    }
  }
}

/**
 * Add a found image to the search result.
 * @param div
 * @param result
 */
function addimage(div, result) {
  var resource = findimage(result['searchmonkey_feed']);
  if (resource) {
    var imgdiv = document.createElement("div");
    imgdiv.className = "resultimage";
    var img = document.createElement("img");
    img.src = resource;
    imgdiv.appendChild(img);
    div.appendChild(imgdiv);
  }
}

/**
 * If there are delicious saves, indicate it with a logo and number (as title)
 * @param div
 * @param result
 */
function addsaves(div, result) {
  var delsaves = result.delicious_saves;
  if (delsaves) {
    var delimg = document.createElement("img");
    delimg.src = "http://l.yimg.com/hr/1124/img/delicious.small.gif";
    delimg.title = delsaves;
    div.appendChild(delimg);
    div.appendChild(document.createTextNode(" "));
  }
}

/**
 * Add the tag span and tags to the result
 * @param div
 * @param result
 */
function addtags(div, result) {
  var deltags = result.delicious_toptags;
  if (deltags) {
    var tagspan = document.createElement("span");
    tagspan.className = "url tag";
    var tags = deltags.tags.tag;
    if (tags instanceof Array) {
      for (var t in tags) {
        if (t == 8) break;
        var tag = tags[t];
        addtag(tagspan, tag);
      }
    } else {
      addtag(tagspan, tags);
    }
    var br = document.createElement("br");
    div.appendChild(br);
    div.appendChild(tagspan);
  }
}

/**
 * Add a clear element.
 * @param div
 */
function addclear(div) {
  var clear = document.createElement("div");
  clear.className = "clear";
  div.appendChild(clear);
}

/**
 * Loop over the terms found in a result and accumulate them.
 * @param topterms
 * @param result
 */
function addterms(topterms, result) {
  var keyterms = result.keyterms.terms;
  if (keyterms) {
    keyterms = keyterms.term;
    if (keyterms instanceof Array) {
      for (var k in keyterms) {
        var keyterm = keyterms[k];
        addterm(topterms, keyterm);
      }
    } else {
      addterm(topterms, keyterms);
    }
  }
}

/**
 * Update the top term tabs with the most popular terms for the result page.
 * @param topterms
 */
function updatetabs(topterms) {
  // Clear tabs
  var tabs = document.getElementById("terms");
  clearchildren(tabs, "timereport");
  // Sort the top terms
  var termlist = sortterms(topterms);
  for (var i in termlist) {
    if (i == 10) break;
    var taba = document.createElement("a");
    for (var k in termlist[i]) {
      k = k.replace("'", "");
      taba.href = "javascript:doquery('" + myInput.value + " " + k + "')";
      var tabdiv = document.createElement("div");
      tabdiv.innerHTML = k;
      tabdiv.className = "tab";
      taba.appendChild(tabdiv);
    }
    tabs.appendChild(taba);
  }
}

/**
 * This is the coordination for the search update.
 * @param yql
 */
function search(yql) {
  splashdiv.style.display = "none";
  resultdiv.style.display = "inline";

  var results = yql.query.results.result;
  var time = yql.query.diagnostics['user-time'];
  document.getElementById("timereport").innerHTML = time + " ms";
  var topterms = {};
  for (var i in results) {
    // Get the result from YQL
    var result = results[i];

    // Create the search result elements
    var h2 = document.createElement("h2");
    h2.className = "t";
    var h2_a = document.createElement("a");
    h2_a.href = result.clickurl;
    h2_a.innerHTML = result.title;
    h2.appendChild(h2_a);
    var p = document.createElement("p");
    p.innerHTML = result['abstract'];
    var a = document.createElement("a");
    a.className = "url";
    a.href = result.clickurl;
    a.title = result.url;
    a.innerHTML = result.dispurl;

    // Add them to the waiting div
    var div = resultElements[i];
    clearchildren(div);
    // Add the title
    div.appendChild(h2);
    // Add an image if search monkey knows about one
    addimage(div, result);
    // Add the abstract
    div.appendChild(p);
    // Add delicious if its been saved
    addsaves(div, result);
    // Add the URL
    div.appendChild(a);
    // Add delicious top tags
    addtags(div, result);
    addclear(div);
    // Gather the top terms
    addterms(topterms, result);
  }
  // Update the tabs at the top with the popular terms from the result set
  updatetabs(topterms);
  // Return focus to the search box
  setTimeout(function() {myInput.focus();}, 500); 
}
