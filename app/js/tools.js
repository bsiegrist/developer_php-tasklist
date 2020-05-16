const delegate = (cssClass, myfunction) => {
    return (event) => {
        if (event.target.matches(cssClass)){
            myfunction(event);
        };
    };
};

export {delegate};