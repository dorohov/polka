var jsLocalStorage=function(){"use strict";var t=this;return t.set=function(t,e){localStorage.setItem(t,e)},t.get=function(t){var e=localStorage.getItem(t);return"undefined"!=typeof e&&null!=e?localStorage.getItem(t):null},t.remove=function(t){localStorage.removeItem(t)},t.clear=function(){localStorage.clear()},t.obj2s=function(t,e){this.set(t,JSON.stringify(e))},t.s2obj=function(t){var e=this.get(t);return"undefined"!=typeof e&&null!=e?JSON.parse(e):null},t};