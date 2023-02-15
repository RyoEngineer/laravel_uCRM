
const nl2br = (str) =>  {
    if (str==null)
      return null;
    var res = str.replace(/\r\n/g, "<br>");
    res = res.replace(/(\n|\r)/g, "<br>");
    return res;
  }

  export { nl2br }