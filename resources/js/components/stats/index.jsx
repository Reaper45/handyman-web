import React from 'react';
import ReactDOM from "react-dom";

import Stat from "./Stat";

import userCheck from "../../../icons/icon-user-check.svg";
import group from "../../../icons/icon-group.svg";
import thumb from "../../../icons/icon-thumb-up.svg";
import briefcase from "../../../icons/icon-briefcase.svg";

function Stats() {
	return (
        <div class="grid gap-8 grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-4">
            <Stat
                icon={userCheck}
                value="23"
                title="Active handymen"
                to="/handymen"
            />
            <Stat icon={group} value="34" title="Total clients" to="/clients" />
            <Stat icon={thumb} value="5" title="Jobs complete" to="/jobs" />
            <Stat icon={briefcase} value="8" title="Ongoing jobs" to="/jobs" />
        </div>
    );
}

export default Stats;

if (document.getElementById("dashboard-stats")) {
    ReactDOM.render(<Stats />, document.getElementById("dashboard-stats"));
}

