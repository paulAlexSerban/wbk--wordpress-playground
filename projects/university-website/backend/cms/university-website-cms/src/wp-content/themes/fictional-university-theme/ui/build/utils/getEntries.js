const glob = require('glob');
const path = require('path');
const configs = require('../configs');
const { paths } = configs;


const getEntries = () => {
    const jsEntries = glob.sync(path.join(paths.SRC_DIR, 'js', '*.entry.js'));
    const scssEntries = glob.sync(
        path.join(paths.SRC_DIR, 'css', '*.entry.scss')
    );

    const jsEntriesObj = jsEntries.reduce((accumulator, jsEntry) => {
        const entryName = jsEntry.split('/').slice(-1)[0].replace('.entry.js', '');
        accumulator[entryName] = jsEntry;
        console.log({ jsEntry, entryName });
        return accumulator;
    }, {});

    const scssEntriesObj = scssEntries.reduce((accumulator, scssEntry) => {
        const entryName = scssEntry.split('/').slice(-1)[0].replace('.entry.scss', '');
        accumulator[entryName] = scssEntry;
        console.log({ scssEntry, entryName });
        return accumulator;
    }, {});

    return {
        jsEntries,
        scssEntries,
        jsEntriesObj,
        scssEntriesObj
    };
};
module.exports = getEntries;
