// Copyright (c) 2008 Yahoo! Inc. All rights reserved.
// Licensed under the Yahoo! Search BOSS Terms of Use
// (http://info.yahoo.com/legal/us/yahoo/search/bosstos/bosstos-2317.html)

/**
 * Create 2 very similar autocomplete controls and search buttons for the splash page and the result page.
 */

var myDataSource = YQL.datasource("use 'http://www.4hoursearch.com/yql/suggest.xml' as suggest; select * from suggest where query=@query", ["query.results.s", "k"]);

var myAutoComp = new YAHOO.widget.AutoComplete("myInput", "myContainer", myDataSource);

// Container will expand and collapse vertically
myAutoComp.animVert = true;
myAutoComp.scriptCallbackParam = "query";

// Require user to type at least 3 characters before triggering a query
myAutoComp.minQueryLength = 3;

// Disable type ahead
myAutoComp.typeAhead = false;
myAutoComp.autoHighlight = false;

// Submit button
new YAHOO.widget.Button(
        "searchbutton", {
    type: "submit",
    label: "Search"
});

new YAHOO.widget.Button(
        "reloadbutton", {
    type: "submit",
    label: "Reload"
});
new YAHOO.widget.Button(
        "searchbutton2", {
    type: "submit",
    label: "Search"
});

new YAHOO.widget.Button(
        "putval", {
    type: "button",
    label: "Restore Defaults"
});
