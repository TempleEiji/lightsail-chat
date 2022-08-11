export type QuestionRes = {
    step: number
    msg: string
    beforemsg: string
    aftermsg: string
    options: any
    sender: string
}

export type OptionsData = {
    data: Options
}

export type Options = {
    step: number,
    text: string,
    img: string,
    list: []
}