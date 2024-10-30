export function unixDateToDate(value: number): Date {
	return new Date(value * 1000);
}
