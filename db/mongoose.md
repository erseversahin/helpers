# Mongoose 

## Regex Search

```
    const searchObj = {}

    const namePatternFromSearchValue = new RegExp("sahin", "si")
    const surnamePatternFromSearchValue = new RegExp("ersever", "si")

    searchObj['name'] = patternFromSearchValue
    searchObj['surname'] = surnamePatternFromSearchValue

    <Schema>.find().where(searchObj)
```