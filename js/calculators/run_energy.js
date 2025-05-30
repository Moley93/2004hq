function runCalc() {
    const currentRunEnergy = parseInt(document.getElementById("currentRunEnergy").value);
    const agilityLevel = parseInt(document.getElementById("agilityLevel").value);
    const recovered = Math.floor(agilityLevel / 9) + 8;
    const recoveryPerTick = recovered / 50;
    const secondsPerPercent = 0.6 / recoveryPerTick * 2;

    document.getElementById("restorePerPercent").textContent = `${secondsPerPercent.toFixed(2)} seconds`;

    const energyToRestore = 100 - currentRunEnergy;
    const timeToRestoreInSeconds = energyToRestore * secondsPerPercent;

    const minutes = Math.floor(timeToRestoreInSeconds / 60);
    const seconds = Math.floor(timeToRestoreInSeconds % 60);

    let restoreTime = `${minutes} minutes and ${seconds} seconds`;
    document.getElementById("restoreTime").textContent = restoreTime;

    const restorePerSecond = 1 / secondsPerPercent;
    const restoreInOneMinute = restorePerSecond * 60;

    document.getElementById("restoreOneMinute").textContent = `${Math.min(restoreInOneMinute, 100).toFixed(0)}%`;
}
["agilityLevel", "currentRunEnergy"].forEach(id => {
    document.getElementById(id).addEventListener("change", runCalc);
});