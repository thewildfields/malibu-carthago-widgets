const getFurthestAncestor = (el, selector) => {
    let match = null;
    let current = el.parentElement;
  
    while (current) {
        if (current.matches(selector)) {
            match = current;
        }
        current = current.parentElement;
    }
  
    return match;
}

export default getFurthestAncestor;