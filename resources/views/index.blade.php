@extends('layout.default')
@section('content')
    <div id="react-app" class="react-app"></div>

    <script src="./js/react.production.min.js"></script>
    <script src="./js/react-dom.production.min.js"></script>
    <script src="./js/index.min.js"></script>
    <script src="./js/Collapse.umd.js"></script>
    <script src="https://unpkg.com/babel-standalone@6.26.0/babel.min.js"></script>

    <script id="rendered-js" type="text/babel">
        function _defineProperty(obj, key, value) {
            if (key in obj) {
                Object.defineProperty(obj, key, {value: value, enumerable: true, configurable: true, writable: true});
            } else {
                obj[key] = value;
            }
            return obj;
        }

        const Collapse = window.Collapse;
        const cx = window.classNames;

        class FormStep1 extends React.Component {
            constructor(props) {
                super(props);
                this.state = {value: ''};

                this.handleChange = this.handleChange.bind(this);
                this.handleSubmit = this.handleSubmit.bind(this);

                }

            handleChange(event) {
                this.setState({value: event.target.value});
            }

            handleSubmit(event) {
                alert('A name was submitted: ' + this.state.value);
                event.preventDefault();
            }

            render() {
                return (
                    <div class="form-wrapper">
                        <p>
                            <label>First name</label>
                            <input type="text" name="firstname" onChange={this.myChangeHandler}/>
                        </p>

                        <p>
                            <label>Surname</label>
                            <input type="text" name="surname" onChange={this.myChangeHandler}/>
                        </p>

                        <p>
                            <label>Email address</label>
                            <input type="text" name="email" onChange={this.myChangeHandler}/>
                        </p>

                        <button type="button" onClick={this.onToggle}>Next ></button>
                        <div></div>
                    </div>
                );
            }
        }

        class FormStep2 extends React.Component {
            constructor(props) {
                super(props);
                this.state = {value: ''};

                this.handleChange = this.handleChange.bind(this);
                this.handleSubmit = this.handleSubmit.bind(this);
            }

            handleChange(event) {
                this.setState({value: event.target.value});
            }

            handleSubmit(event) {
                alert('A name was submitted: ' + this.state.value);
                event.preventDefault();
            }

            render() {
                return (
                    <div class="form-wrapper">
                        <p>
                            <label>Telephone number</label>
                            <input type="text" name="phone" onChange={this.myChangeHandler}/>
                        </p>

                        <p>
                            <label>Gender</label>
                            <div className="select-wrapper">
                                <select name="gender" onChange={this.myChangeHandler}>
                                    <option>Select gender</option>
                                    <option value="m">Male</option>
                                    <option value="f">Female</option>
                                </select>
                            </div>
                        </p>

                        <p className="number-fields">
                            <label>Date of birth</label>
                            <input type="text" name="day" min="1" max="31" maxLength="2"
                                   onChange={this.myChangeHandler}/>
                            <input type="text" name="month" min="1" max="12" maxLength="2"
                                   onChange={this.myChangeHandler}/>
                            <input type="text" name="year" min="1920" max="2019" maxLength="4"
                                   onChange={this.myChangeHandler}/>
                        </p>

                        <button type="button" onClick={this.onClickHandler}>Next ></button>
                        <div></div>
                    </div>
                );
            }
        }

        class FormStep3 extends React.Component {
            constructor(props) {
                super(props);
                this.state = {value: ''};

                this.handleChange = this.handleChange.bind(this);
                this.handleSubmit = this.handleSubmit.bind(this);
            }

            handleChange(event) {
                this.setState({value: event.target.value});
            }

            handleSubmit(event) {
                alert('A name was submitted: ' + this.state.value);
                event.preventDefault();
            }

            render() {
                return (
                    <div class="form-wrapper">
                        <p>
                            <label>Comments</label>
                            <textarea name="comments" onChange={this.myChangeHandler}></textarea>
                        </p>

                        <button type="button" onClick={this.onClickHandler}>Finish</button>
                        <div></div>
                    </div>
                );
            }
        }

        class App extends React.Component {
            constructor(...args) {
                super(...args);
                _defineProperty(this, "state",
                    {
                        index: 1
                    });
                _defineProperty(this, "onToggle",
                    (index) =>
                        this.setState(state => ({index: state.index === index ? null : index})));
            }

            render() {
                return (
                    React.createElement("section", {className: "app"},

                        React.createElement("div", {className: cx("item", {"item--active": this.state.index === 1})},
                            React.createElement("div", {className: "button-wrapper"},
                                React.createElement("button", {className: "btn", onClick: () => this.onToggle(1)},
                                    React.createElement("span", null, "Step 1: Your details"), " ", ""
                                ),
                            ),

                            React.createElement(Collapse, {
                                className: "collapse",
                                isOpen: this.state.index === 1,
                                onChange: ({state}) => {
                                    this.setState({item1: state});
                                },
                                onInit: ({state}) => {
                                    this.setState({item1: state});
                                },
                                render: collapseState => step1(collapseState)
                            })
                        ),


                        React.createElement("div", {className: cx("item", {"item--active": this.state.index === 2})},
                            React.createElement("div", {className: "button-wrapper"},
                                React.createElement("button", {className: "btn", onClick: () => this.onToggle(2)},
                                    React.createElement("span", null, "Step 2: More comments"), " ", ""
                                ),
                            ),

                            React.createElement(Collapse, {
                                className: "collapse",
                                isOpen: this.state.index === 2,
                                onChange: ({state}) => {
                                    this.setState({item2: state});
                                },
                                onInit: ({state}) => {
                                    this.setState({item2: state});
                                },
                                render: collapseState => step2(collapseState)
                            })
                        ),


                        React.createElement("div", {className: cx("item", {"item--active": this.state.index === 3})},
                            React.createElement("div", {className: "button-wrapper"},
                                React.createElement("button", {className: "btn", onClick: () => this.onToggle(3)},
                                    React.createElement("span", null, "Step 3: Final comments"), " ", ""
                                ),
                            ),

                            React.createElement(Collapse, {
                                className: "collapse",
                                isOpen: this.state.index === 3,
                                onChange: ({state}) => {
                                    this.setState({item3: state});
                                },
                                onInit: ({state}) => {
                                    this.setState({item3: state});
                                },
                                render: collapseState => step3(collapseState)
                            }))));
            }
        }

        ReactDOM.render(React.createElement(App, null), document.querySelector("#react-app"));
        ReactDOM.render(React.createElement(FormStep1, null), document.querySelector("#formStep1"));
        ReactDOM.render(React.createElement(FormStep2, null), document.querySelector("#formStep2"));
        ReactDOM.render(React.createElement(FormStep3, null), document.querySelector("#formStep3"));

        function step1(collapseState) {
            return (
                React.createElement("div", {className: `content ${collapseState}`},
                    React.createElement("div", {id: "formStep1", className: "formstep-1 content-wrapper"}),
                )
            );
        }

        function step2(collapseState) {
            return (
                React.createElement("div", {className: `content ${collapseState}`},
                    React.createElement("div", {id: "formStep2", className: "formstep-2 content-wrapper"}),
                )
            );
        }

        function step3(collapseState) {
            return (
                React.createElement("div", {className: `content ${collapseState}`},
                    React.createElement("div", {id: "formStep3", className: "formstep-3 content-wrapper"}),
                )
            );
        }
    </script>
@stop
